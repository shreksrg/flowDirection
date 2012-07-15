<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 奇遇空间文章控制器
 * @author by shrek
 * @data   2012-04-21
 */
//require_once APPPATH."libraries/suppaginater.php";
class Articles extends CI_controller
{
	var $data = array();
     public function __construct()
     {
          parent::__construct();
		  	
     }
	 public function publits($atype=1,$curpage=1){
		
		$data=array();
		$param=array();
		$path='';
		$pathURI='/index.php/space/articles/publits/';
		
		$param['subPageLink']=$pathURI.$atype;
		$param['eachDisNums']=20; // 每页显示记录数
		$param['currentPage']=$curpage;  //当前页码
		
		$sql_limit=($curpage-1)*$param['eachDisNums'].','.$param['eachDisNums'] ;
		$sql_params=array('typeid'=>$atype,'limit'=>$sql_limit);	
		
		$this->load->model('spacex/mp_spacex_model','articles',true);
		$data['listArticle']=$this->articles->getArticlelist($sql_params);	
		//$data['curpage']=$curpage;
		$param['nums']=$data['listArticle']['count'];  //记录总数
		
		
		
		$this->load->library('suppaginater',$param);
		// echo $this->suppaginater->getTotalPageNum();
		$this->suppaginater->setShowPageNum(6);      //设置显示的页数  
		$this->suppaginater->setCurrentIndexPage(2);    //设置当前页在分页栏中的位置  
		$this->suppaginater->setFirstPageText(false);    //设置链接第一页显示的文字  
		$this->suppaginater->setLastPageText(false);      //设置链接最后一页显示的文字 
		$this->suppaginater->setLinkSymbol('/');        //设置地址链接中页码与变量的连接符，如page=2中的"="   
		//$paginater->setPrePageText($text);     // 设置链接上一页显示的文字  
		//$paginater->setNextPageText($text);     // 设置链接下一页显示的文字  
		//$paginater->setPageCss($css);        //设置各分页码css样式的class名称  
		$this->suppaginater->setCurrentPageCss('curpage');   // 设置当前页码css样式的class名称  
		$this->suppaginater->setNumTagOpen('');
		$this->suppaginater->setNumTagClose('');
		//$paginater->setPageStyle($style);     // 设置各分页码的样式，即style属性  
		//$paginater->setCurrentPageStyle($style);  //设置当前页码的样式，即style属性  
		
		$this->suppaginater->isShowFirstAndLast(false);    //设置是否显示第一页与最后一页的链接  
		$this->suppaginater->isShowForSimplePage(true);    //设置当只有一页时是否显示分页  
		//$pageCount = $paginater->getTotalPageNum();  //获取总页数  
	 	$data['pagination']=$this->suppaginater->generatePages();
		
		$path=$this->articles->getArticlePathID($atype);
		if($path){
			foreach($path as $key=>$item){
				$uriLink[]='<a href="'.$pathURI.$item['id'].'">'.$item['typename'].'</a>';	
			}
			$data['categorypath']=join(' > ',$uriLink);	
		}
		$this->parser->parse('spacex/mp_newslist.tpl',$data);	// 加载模板

	}
	
	
	public function pubviewArticle($id){
		$data=array();
		$pathURI='/index.php/space/articles/publits/';
		$this->load->model('spacex/mp_spacex_model','articles',true); 
		$rows=$this->articles->getArticleCont($id);
		if($rows){
			$data['optArticle']=$rows;
	
			$path=$this->articles->getArticlePathID($rows['typeid']);
			if($path){
				foreach($path as $key=>$item){
					$uriLink[]='<a href="'.$pathURI.$item['id'].'">'.$item['typename'].'</a>';
				}
				$data['optArticle']['categorypath']=join(' > ',$uriLink);	
			}
			
			$this->articles->addonClicks($id);  // 增加文章点击数
		}
		
		// 精彩故事列表
		$data['secstoryC1']=$this->articles->getArticleSection_rand('8','c','0,10');
		// 更多故事列表
		$data['secstoryC2']=$this->articles->getArticleSection_rand(8,'p','0,6');
		
		$this->parser->parse('spacex/mp_newsdetail.tpl',$data);	// 加载模板
		
	}
	
	static function getArticlePath($id){
		$this->load->model('spacex/mp_spacex_model','articles',true);
		$path=$this->articles->getArticlePathID($id);
		if($path){
			print_r($path);	
		}
		
		
	}
	
	/*********************************************************************

    函数名称:DeCode

    函数作用:加密解密字符串

    使用方法:

    加密     :DeCode('daichao','E','daichao');

    解密     :DeCode('被加密过的字符串','D','daichao');

    参数说明:

    $string   :需要加密解密的字符串

    $operation:判断是加密还是解密:E:加密   D:解密

    $key      :加密的钥匙(密匙);

    *********************************************************************/

    public static function DeCode($string,$operation,$key='')

    {

        $key=md5($key);

        $key_length=strlen($key);

        $string=$operation=='D'?base64_decode($string):substr(md5($string.$key),0,8).$string;

        $string_length=strlen($string);

        $rndkey=$box=array();

        $result='';

        for($i=0;$i<=255;$i++)

        {

            $rndkey[$i]=ord($key[$i%$key_length]);

            $box[$i]=$i;

        }

        for($j=$i=0;$i<256;$i++)

        {

            $j=($j+$box[$i]+$rndkey[$i])%256;

            $tmp=$box[$i];

            $box[$i]=$box[$j];

            $box[$j]=$tmp;

        }

        for($a=$j=$i=0;$i<$string_length;$i++)

        {

            $a=($a+1)%256;

            $j=($j+$box[$a])%256;

            $tmp=$box[$a];

            $box[$a]=$box[$j];

            $box[$j]=$tmp;

            $result.=chr(ord($string[$i])^($box[($box[$a]+$box[$j])%256]));

        }

        if($operation=='D')

        {

            if(substr($result,0,8)==substr(md5(substr($result,8).$key),0,8))

            {

                return substr($result,8);

            }

            else

            {

                return'';

            }

        }

        else

        {

            return str_replace('=','',base64_encode($result));

        }

    }
	
	
     
    /**
     *故事列表
     */
    public function indexbak()
    {
    	$data = array();
    	$data = $this->data;
    	$this->load->model('member/members_model', '', TRUE);
    	//$this->load->model('member/members_profile_model', '', TRUE);
	    //$data = $this->members->get_member($this->user_id);
    	$data['storyList'] = $this->story_model->get_storys($this->user_id);
    	if( $this->uri->segment( 4 ) )
    	{
    		
     		
    	    $this->parser->parse('blog/member_story.tpl',$data);
    	}
    	else
    	{
    	   $this->parser->parse('blog/story.tpl',$data);
    	}
		
    }
    
    /**
     * 新增故事
     */
    public function add_story()
    {
        if(!empty($_POST))
        {
        	 $pathUlr = site_url('/blog/story/add_story');
        	 $data['username']   = $this->user_name;
             $data['userid']     = $this->user_id;
             $data['catid']      = 100; // 姑且奇遇故事大分类id定义为 100
             
	        if($data['albumname'] = $this->input->post('subject'))
	        {
	        	$data['dateline']   = time();
	            $data['tags']     = $this->input->post('blog_type'); //故事标签，可以定义成二级分类	
	            $data['description'] = $this->input->post('content');
	            
	            $filename = gmdate('YmdHis', 8 * 3600);
                $img_file = upload_pic('cover_img', 'thumb', $filename, true, array('150', '150'));
                
                $data['thumb'] = $img_file[1]['thumb'];
                
	            $this->story_model->insert_storys($data);
	            $this->load->model('common/credit_model');
	            $this->credit_model->credit_opertion($this->user_id, 1, 3);
	            redirect($pathUlr);
	        }
	        else
	        {
	            echo "<script language='javascript'>alert('标题不能为空!');location.href='/index.php/blog/story/add_story';</script>";die;
	        }
        }    
        
        $data = array();
        $data = $this->data;
		$this->parser->parse('blog/add_story.tpl', $data );
    }
    
       /**
        * 编辑故事
        */
       public function edit_story(){
       	
        $pathUlr = site_url('/blog/story');
        if(!empty($_POST))
        { 
            if($data['albumname'] = $this->input->post('subject'))
	        { 
	        	 
	        	$data['dateline']    = time();
	            $data['tags']        = $this->input->post('blog_type'); //故事标签，可以定义成二级分类	
	            $data['description'] = $this->input->post('content');
	            $albumid              = $this->input->post('albumid');
	            
	            $filename = gmdate('YmdHis', 8 * 3600);
                $img_file = upload_pic('cover_img', 'thumb', $filename, true, array('150', '150'));
                if($img_file[0])
                {
                   $old_thumb = $this->input->post('thumb');
                   $data['thumb'] = $img_file[1]['thumb'];
                   $root = rtrim($_SERVER['DOCUMENT_ROOT'],'/');
                 
                   $old_bigthumb = str_ireplace("_thumb", '', $old_thumb);
                   @unlink($root.$old_bigthumb);
                   @unlink($root.$old_thumb);
                }
               
	            $this->story_model->update_storys($data, $albumid);
		        
		        redirect($pathUlr);
	        }
            else
	        {
	            echo "<script language='javascript'>alert('标题不能为空!');location.href='/index.php/blog/story';</script>";die;
	        }
        }    
        
    	if(!$storyId = $this->uri->segment(4))
    	{
    	    redirect($pathUlr);
    	}
    	
    	$data = $this->data;
    	$data['story'] = $this->story_model->get_Storys(false, $storyId);
		$this->parser->parse('blog/edit_story.tpl',$data);
    	
    }

	    /**
	     * 删除故事
	     */
	    public function delete_storys()
	    {
	        if($storyId = (array)$this->input->get('blogid'))
	        {  
	            foreach($storyId as $values)
	            {     
	                   $story = $this->story_model->get_storys(false, $values);
	                   $big_thumb = str_ireplace("_thumb", '', $story['thumb']);
	                   
	                   $root = rtrim($_SERVER['DOCUMENT_ROOT'],'/');
	                   @unlink($root.$big_thumb);
	                   @unlink($root.$story['thumb']);
	                   if($values == $story['albumid']) $this->story_model->delete_story($values);
	            }
	        }
	        return true;
	    }

	    
	    /**
	     * 故事日志详细
	     */
	    public function detail_story()
	    {
	    	$data = $this->data;
	        if($storyId = $this->uri->segment(4))
	        {
	           $this->load->model('blog/m_comment','',TRUE);
	           $data['story'] = $this->story_model->get_Storys(false, $storyId);
	           $this->load->model('member/members_model', '', TRUE);
	           $this->load->model('member/members_profile_model', '', TRUE);
	          
	           $commentList = $this->m_comment->getCommentListByBlogId($storyId, 1);
	           if ( !empty( $commentList ) )
	           {
	           		foreach ( $commentList as $d=>$dv )
	           		{
	           			$avatar_img_s = "/data/avatar/".get_avatar( $commentList[$d]['userid'], 'small' );
						$avatar_img_s = file_exists( '.'.$avatar_img_s ) ? $avatar_img_s : '/static/images/avatar/noavatar_big.gif';
						$commentList[$d]['avatar_img'] = $avatar_img_s;
	           		}
	           		
	           		$data['commentList'] = $commentList;
	           }
	           
	           $member_info = array();
	           $member_profile_info = array();
			  
			    $member_info = $this->members_model->get_member($data['story']['userid']);
			    $member_profile_info = $this->members_profile_model->get_member_profile( $data['story']['userid'] );
				
				$avatar_img = "/data/avatar/".get_avatar( $data['story']['userid'], 'big' );
				$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
				$member_profile_info['avatar_img'] = $avatar_img;
				
				$member_profile_info['age'] = date( 'Y', time() ) - $member_profile_info['birthyear'];
				
				$data['member'] = $member_info;
				$data['member_profile'] = $member_profile_info;
			           
	        }
			$this->parser->parse('blog/member_story_detail.tpl',$data);
	    }
}
