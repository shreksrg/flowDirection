<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

//分页类  
class Suppaginater{  
  private $eachDisNums;          //每页显示的条目数  
  private $nums;              //总条目数  
  private $currentPage;          //当前被选中的页  
  private $showPageNum = 5;        //每次显示的页数  
  private $curIndexPage = 3;        //当前页在分页中的位置  
  private $totalPageNum;          //总页数  
  private $arrPage = array();        //用来构造分页的数组  
  private $subPageLink;          //每个分页的链接  
  private $firstPageText = '<<';      //第一页显示的文字  
  private $lastPageText = '>>';          //最后一页显示的文字  
  private $prePageText = '<';        //上一页显示的文字  
  private $nextPageText = '>';      //下一页显示的文字  
  private $pageCss = '';          //一般页的样式名称  
  private $curPageCss = '';        //当前页的样式名称  
  private $pageStyle = '';        //一般页的样式  
  private $curPageStyle = '';        //当前页的样式  
  private $linkSymbol = '=';        //url链接地址中page与页数之间的符号  
  private $isShowFirstLast = true;    //是否显示第一页和最后一页  
  private $isShowForSimplePage = false;  //当没有分页时(即总条目数不大于每页显示的条目数)是否显示分页栏 
  
  private $numTagOpen  = '<span>';
  private $numTagClose = '</span>';
    
  /**  
   * 设置显示的页数  
   *  
   * @param integer $num 显示的页数  
   * @return void  
   */  
  public function setShowPageNum($num){  
    $this->showPageNum = $num;  
  }  
 
  /**  
   * 设置当前页在分页栏中的位置  
   *  
   * @param integer $num 当前页在分页栏中的位置  
   * @return void  
   */  
  public function setCurrentIndexPage($num){  
    $this->curIndexPage = $num;  
  }  
 
  /**  
   * 设置链接第一页显示的文字  
   *  
   * @param string $text 要显示的文字  
   * @return void  
   */  
  public function setFirstPageText($text){  
    $this->firstPageText = $text;  
  }  
 
  /**  
   * 设置链接最后一页显示的文字  
   *  
   * @param string $text 要显示的文字  
   * @return void  
   */  
  public function setLastPageText($text){  
    $this->lastPageText = $text;  
  }  
  
 
  /**  
   * 设置链接上一页显示的文字  
   *  
   * @param string $text 要显示的文字  
   * @return void  
   */  
  public function setPrePageText($text){  
    $this->prePageText = $text;  
  }  
 
  /**  
   * 设置链接下一页显示的文字  
   *  
   * @param string $text 要显示的文字  
   * @return void  
   */  
  public function setNextPageText($text){  
    $this->nextPageText = $text;  
  }  
 
  /**  
   * 设置各分页码css样式的class名称  
   *  
   * @param string $css css样式名称  
   * @return void  
   */  
  public function setPageCss($css){  
    $this->pageCss = $css;  
  }  
 
  /**  
   * 设置当前页码css样式的class名称  
   *  
   * @param string $css css样式名称  
   * @return void  
   */  
  public function setCurrentPageCss($css){  
    $this->curPageCss = $css;  
  }  
 
  /**  
   * 设置各分页码的样式，即style属性  
   *  
   * @param string $style style样式  
   * @return void  
   */  
  public function setPageStyle($style){  
    $this->pageStyle = $style;  
  }  
 
  /**  
   * 设置当前页码的样式，即style属性  
   *  
   * @param string $style style样式  
   * @return void  
   */  
  public function setCurrentPageStyle($style){  
    $this->curPageStyle = $style;  
  }  
  
  
  /**  
   * 设置数字分页码的HTML开始标签  
   *  
   * @param string $style  
   * @return void  
   */  
  public function setNumTagOpen($tag){  
    $this->numTagOpen = $tag;  
  } 
  
   /**  
   * 设置数字分页码的HTML结束标签  
   *  
   * @param string $style  
   * @return void  
   */
  public function setNumTagClose($tag){  
    $this->numTagClose = $tag;  
  } 
  
  
 
  /**  
   * 设置地址链接中页码与变量的连接符，如page=2中的"="  
   *  
   * @param string $symbol 连接符号  
   * @return void  
   */  
  public function setLinkSymbol($symbol){  
    $this->linkSymbol = $symbol;  
  }  
 
  /**  
   * 获取总页数  
   *  
   * @access private  
   * @return integer  
   */  
  public function getTotalPageNum(){  
    return $this->totalPageNum;  
  }  
 
  /**  
   * 设置是否显示第一页与最后一页的链接  
   *  
   * @param boolean $is true:显示，false:不显示  
   * @return void  
   */  
  public function isShowFirstAndLast($is){  
    $this->isShowFirstLast = $is;  
  }  
 
  /**  
   * 设置当只有一页时是否显示分页  
   *  
   * @param boolean $is true:显示，false:不显示  
   * @return void  
   */  
  public function isShowForSimplePage($is){  
    $this->isShowForSimplePage = $is;  
  }  
 
  /**  
   * 构造方法  
   *  
   * @param integer $eachDisNums 每页显示的条目数  
   * @param integer $nums 总条目数  
   * @param integer $current_num 当前被选中的页  
   * @param integer $showPageNum 每次显示的页数  
   * @param integer $subPageLink 每个分页的链接  
   * @param integer $subPage_type 显示分页的类型  
   * @return void  
    
  public function __construct($eachDisNums, $nums, $currentPage, $subPageLink){  
    $this->eachDisNums=intval($eachDisNums);  
    $nums = $nums==0 ? 1: $nums;  
    $this->nums = intval($nums);  
    $this->totalPageNum = ceil($nums/$eachDisNums);  
    $this->currentPage =intval($currentPage);  
    $this->currentPage =  $this->currentPage<=0 ? 1: $this->currentPage;  
    $this->currentPage = $this->currentPage > $this->totalPageNum ? 1 : $this->currentPage;  
    $this->subPageLink = $subPageLink;  
    $this->lastPageText = '..'.$this->totalPageNum;  
  }  */ 
  
  public function __construct($param){  
  
  	$eachDisNums=$param['eachDisNums'];
	$nums=$param['nums'];
	$currentPage=$param['currentPage'];
	$subPageLink=$param['subPageLink'];
	
	
	
  	$this->eachDisNums=intval($eachDisNums);  
    $nums = $nums==0 ? 1: $nums;  
    $this->nums = intval($nums);  
    $this->totalPageNum = ceil($nums/$eachDisNums);  
    $this->currentPage =intval($currentPage);  
    $this->currentPage =  $this->currentPage<=0 ? 1: $this->currentPage;  
    $this->currentPage = $this->currentPage > $this->totalPageNum ? 1 : $this->currentPage;  
    $this->subPageLink = $subPageLink;  
    $this->lastPageText = '..'.$this->totalPageNum;
  }
 
  public function __destruct(){  
    unset($this->eachDisNums);  
    unset($this->nums);  
    unset($this->currentPage);  
    unset($this->showPageNum);  
    unset($this->curIndexPage);  
    unset($this->totalPageNum);  
    unset($this->arrPage);  
    unset($this->subPageLink);  
    unset($this->firstPageText);  
    unset($this->lastPageText);  
    unset($this->prePageText);  
    unset($this->nextPageText);  
    unset($this->pageCss);  
    unset($this->curPageCss);  
    unset($this->pageStyle);  
    unset($this->curPageStyle);  
    unset($this->linkSymbol);  
    unset($this->isShowFirstLast);  
    unset($this->isShowForSimplePage);      
  }  
 
  /**  
   * 生成分页  
   *  
   * @return string  
   */  
  public function generatePages(){  
    $subPageCss2Str = '';  

    $isShow = false;  
    if($this->totalPageNum == 1){  //只有一页时  
      if($this->isShowForSimplePage){  
        $isShow = true;  
      }  
    }else{  
      $isShow = true;  
    }  
     //  var_dump($isShow);
    if($isShow){  
		
      if($this->currentPage > 1){  
        $prewPageUrl = $this->subPageLink.$this->linkSymbol.($this->currentPage-1);  
        if($this->isShowFirstLast){  
          $firstPageUrl = $this->subPageLink.$this->linkSymbol."1";  
          $subPageCss2Str .= '<a href="'.$firstPageUrl.'" class="'.$this->pageCss.'" style="'.$this->pageStyle.'">'.$this->firstPageText.'</a>';  
        }  
        $subPageCss2Str .= '<a href="'.$prewPageUrl.'" class="'.$this->pageCss.'" style="'.$this->pageStyle.'">'.$this->prePageText.'</a>';  
      }  
 
      $a=$this->construct_num_Page();  
	 
      for($i=0;$i<count($a);$i++){  
        $s=$a[$i];  
        if($s == $this->currentPage ){  
		  $tmpStr =	$this->numTagOpen.'<a href="#" class="'.$this->curPageCss.'" style="'.$this->curPageStyle.'">'.$s.'</a>'.$this->numTagClose;
          $subPageCss2Str .= $tmpStr;  
        }else{  
          $url = $this->subPageLink.$this->linkSymbol.$s;  
		  $tmpStr =	$this->numTagOpen.'<a href="'.$url.'" class="'.$this->pageCss.'" style="'.$this->pageStyle.'">'.$s.'</a>'.$this->numTagClose;
          $subPageCss2Str .= $tmpStr;  
        }  
      }  
      if($this->currentPage < $this->totalPageNum){  
        $nextPageUrl = $this->subPageLink.$this->linkSymbol.($this->currentPage+1);  
        $subPageCss2Str .= '<a href="'.$nextPageUrl.'" class="'.$this->pageCss.'" style="'.$this->pageStyle.'">'.$this->nextPageText.'</a>';  
        if($this->isShowFirstLast){  
          $lastPageUrl = $this->subPageLink.$this->linkSymbol.$this->totalPageNum;  
          $subPageCss2Str .= '<a href="'.$lastPageUrl.'" class="'.$this->pageCss.'" style="'.$this->pageStyle.'">'.$this->lastPageText.'</a> ';  
        }  
      }  
    }  
    return $subPageCss2Str;  
  }//End of generatePages() Method  
 
  /**  
   * 用来给建立分页的数组初始化的函数。  
   *  
   * @return array  
   */  
  private function initArray(){  
    for($i=0; $i < $this->showPageNum; $i ++){  
      $this->arrPage[$i] = $i;  
    }  
    return $this->arrPage;  
  }//End of initArray() Method  
 
  /**  
   * 用来构造显示的条目  
   * 即：[1][2][3][4][5][6][7][8][9][10]  
   *  
   * @return array  
   */  
  private function construct_num_Page(){  
    if($this->totalPageNum < $this->showPageNum){  
      $currentArray = array();  
      for($i=0; $i < $this->totalPageNum; $i ++){  
        $currentArray[$i] = $i + 1;  
      }  
    }else{  
      $currentArray = $this->initArray();  
      $curArrayLen = count($currentArray);  
      if($this->currentPage <= $this->curIndexPage){  
        for($i=0; $i < $curArrayLen; $i ++){  
          $currentArray[$i] = $i+1;  
        }  
      }elseif (($this->currentPage <= $this->totalPageNum) && ($this->currentPage > ($this->totalPageNum - $this->showPageNum + 1))){    
        //构造最后的分页栏，35 36 37 38 39 40 [下一页] [最后一页] 总页数为40  
        for($i=0; $i < $curArrayLen; $i ++){  
          $currentArray[$i] = $this->totalPageNum - $this->showPageNum + 1 + $i;  
        }  
      }else{  
        for($i=0; $i < $curArrayLen; $i ++){  
          $currentArray[$i] = $this->currentPage - $this->curIndexPage + 1 +$i;  
        }  
      }  
    }  
 
    return $currentArray;  
  }//End of construct_num_Page() Method  
}//End of Pages Class  
