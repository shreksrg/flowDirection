/**
 * Created with JetBrains PhpStorm.
 * User: shiruigang
 * Date: 12-7-12
 * Time: 下午1:46
 * To change this template use File | Settings | File Templates.
 */

var workflow = new Workflow("paintarea");

var nodeObj1_1 = new SKL78xxStart({title:'药厂', connodes:['bc'], counterLab:'销售额:0', rolename:'factory'});
workflow.addFigure(nodeObj1_1, 398, 18);

var nodeObj2_1 = new SKL78xxStart({title:'一级商', connodes:['tc', 'rc', 'bc'], counterLab:'销售额:0', rolename:'primary'});
workflow.addFigure(nodeObj2_1, 65, 150);

var nodeObj2_2 = new SKL78xxStart({title:'未识别', connodes:['tc']});
workflow.addFigure(nodeObj2_2, 710, 150);

var nodeObj2_3 = new SKL78xxStart({title:'未采集', connodes:['tc']});
workflow.addFigure(nodeObj2_3, 880, 150);

var nodeObj3_1 = new SKL78xxStart({title:'二级商', connodes:['tc', 'bc', 'lc', 'rc'], counterLab:'销售额:0', rolename:'secondary'});
workflow.addFigure(nodeObj3_1, 320, 256);

var nodeObj4_1 = new SKL78xxStart({title:'三级商', connodes:['bc', 'tc', 'lc', 'rc'], counterLab:'销售额:0', rolename:'third'});
workflow.addFigure(nodeObj4_1, 320, 356);

var nodeObj4_2 = new SKL78xxStart({title:'KA总部', connodes:['tc','bc', 'lc','tc-h1'], counterLab:'销售额:0', rolename:'ka'});
workflow.addFigure(nodeObj4_2, 610, 356);

var nodeObj5_1 = new SKL78xxStart({title:'医院', connodes:['tc'], counterLab:'销售额:0', rolename:'hospital'});
workflow.addFigure(nodeObj5_1, 25, 532);

var nodeObj5_2 = new SKL78xxStart({title:'第三终端', connodes:['tc'], counterLab:'销售额:0', rolename:'terminal'});
workflow.addFigure(nodeObj5_2, 247, 532);

var nodeObj5_3 = new SKL78xxStart({title:'药店', connodes:['tc'], counterLab:'销售额:0', rolename:'drugstore'});
workflow.addFigure(nodeObj5_3, 453, 532);

var nodeObj5_4 = new SKL78xxStart({title:'连锁药店', connodes:['tc'], counterLab:'销售额:0', rolename:'linkage'});
workflow.addFigure(nodeObj5_4, 664, 532);

var nodeObj5_5 = new SKL78xxStart({title:'无法识别', connodes:['tc'], counterLab:'销售额:0', rolename:'unrecognition'});
workflow.addFigure(nodeObj5_5, 865, 532);

var nodeObj6_1 = new SKL78xxNode({connodes:['rc', 'bc']});
workflow.addFigure(nodeObj6_1, 92, 477);

var nodeObj6_2 = new SKL78xxNode({connodes:['tc']});
workflow.addFigure(nodeObj6_2, 132, 477);

var nodeObj6_3 = new SKL78xxNode({connodes:['tc']});
workflow.addFigure(nodeObj6_3, 387, 477);

var nodeObj6_4 = new SKL78xxNode({connodes:['tc']});
workflow.addFigure(nodeObj6_4, 677, 477);

var nodeObj6_5 = new SKL78xxNode({connodes:['tc']});
workflow.addFigure(nodeObj6_5, 112, 477);


hashConnLines[0] = {node:[nodeObj1_1, nodeObj2_1], port:['op_bc', 'op_tc']}
hashConnLines[1] = {node:[nodeObj1_1, nodeObj2_2], port:['op_bc', 'op_tc']}
hashConnLines[2] = {node:[nodeObj1_1, nodeObj2_3], port:['op_bc', 'op_tc']}

hashConnLines[10] = {node:[nodeObj2_1, nodeObj3_1], port:['op_rc', 'op_tc']}
hashConnLines[11] = {node:[nodeObj2_1, nodeObj4_1], port:['op_bc', 'op_lc']}
hashConnLines[12] = {node:[nodeObj2_1, nodeObj4_2], port:['op_rc', 'op_tc']}
hashConnLines[13] = {node:[nodeObj2_1, nodeObj6_2], port:['op_bc', 'op_tc']}

hashConnLines[30] = {node:[nodeObj3_1, nodeObj4_1], port:['op_bc', 'op_tc']}
hashConnLines[31] = {node:[nodeObj3_1, nodeObj4_2], port:['op_rc', 'op_tch1']}
hashConnLines[32] = {node:[nodeObj3_1, nodeObj6_5], port:['op_lc', 'op_tc']}

hashConnLines[40] = {node:[nodeObj4_1, nodeObj4_2], port:['op_rc', 'op_lc']}
hashConnLines[41] = {node:[nodeObj4_1, nodeObj6_3], port:['op_bc', 'op_tc']}
hashConnLines[43] = {node:[nodeObj4_2, nodeObj6_4], port:['op_bc', 'op_tc']}

hashConnLines[60] = {node:[nodeObj6_1, nodeObj5_1], port:['op_bc', 'op_tc']}
hashConnLines[61] = {node:[nodeObj6_1, nodeObj5_2], port:['op_rc', 'op_tc']}
hashConnLines[62] = {node:[nodeObj6_1, nodeObj5_3], port:['op_rc', 'op_tc']}
hashConnLines[63] = {node:[nodeObj6_1, nodeObj5_4], port:['op_rc', 'op_tc']}
hashConnLines[64] = {node:[nodeObj6_1, nodeObj5_5], port:['op_rc', 'op_tc']}

/**
 * 绘制连接线
 */

for (var i in hashConnLines) {
    hashConnLines[i].connectObj = createConnectLine(hashConnLines[i].node, hashConnLines[i].port);
}


/**
 * 初始化统计数据
 */

var tmpPercent = [];
var tmpTotality = [];

$.ajax({
    type:"post",
    url:"http://localhost/ordermobi/assets/www/draw2D/flow_direction/www/index.php/skview/getInitCount",
    dataType:'json',
    // data:{roles:['0级', '一级', '二级', '三级', 'ka', '医院', '药店', '第三终端', '连锁药店','无性质']},
    success:function (r) {

        for (var i in r[0]) {
            r[0][i].gross = roundDecimal(r[0][i].gross / 1000, 0);
        }
        tmpTotality = r[0];

        for (var i in r[1]) {
            r[1][i].percent = roundDecimal(r[1][i].percent, 2) + '%';
        }


        tmpPercent = r[1];

        //alert( r[0][3].role);
        $('p[role-name=factory]').html('销售额:' + r[0][0].gross);
        $('p[role-name=primary]').html('销售额:' + r[0][0].gross);
        $('p[role-name=secondary]').html('销售额:' + r[0][2].gross);
        $('p[role-name=third]').html('销售额:' + r[0][1].gross);
        $('p[role-name=ka]').html('销售额:' + r[0][3].gross);
        $('p[role-name=hospital]').html('销售额:' + r[0][4].gross);
        $('p[role-name=drugstore]').html('销售额:' + r[0][7].gross);
        $('p[role-name=terminal]').html('销售额:' + r[0][6].gross);
        $('p[role-name=linkage]').html('销售额:' + r[0][8].gross);
        $('p[role-name=unrecognition]').html('销售额:' + r[0][5].gross);

        $('span[role-percent=rp21_31]').html('销售占比:' + r[1][0].percent);
        $('span[role-percent=rp21_41]').html('销售占比:' + r[1][1].percent);
        $('span[role-percent=rp21_42]').html('销售占比:' + r[1][2].percent);

        $('span[role-percent=rp31_41]').html('销售占比:' + r[1][3].percent);
        $('span[role-percent=rp31_42]').html('销售占比:' + r[1][4].percent);

        $('span[role-percent=rp41_42]').html('销售占比:' + r[1][5].percent);

        $('span[role-percent=rp21_5x]').html('销售占比:' + r[1][6].percent);
        $('span[role-percent=rp31_5x]').html('销售占比:' + r[1][7].percent);
        $('span[role-percent=rp41_5x]').html('销售占比:' + r[1][8].percent);

        $('span[role-percent=rp51]').html('销售占比:' + r[1][9].percent);
        $('span[role-percent=rp54]').html('销售占比:' + r[1][10].percent);
        $('span[role-percent=rp53]').html('销售占比:' + r[1][11].percent);
        $('span[role-percent=rp52]').html('销售占比:' + r[1][12].percent);
        $('span[role-percent=rp55]').html('销售占比:' + r[1][13].percent);



        setConnlineColor([0, 1, 2],[104, 5, 240]);
        setConnlineColor([10, 11, 12, 13, 60, 61, 62, 63, 64],[55, 182, 5]);
        setConnlineColor([30, 31, 32, 60, 61, 62, 63, 64],[240, 5, 16]);
        setConnlineColor([40, 41, 60, 61, 62, 63, 64],[240, 198, 5]);
        setConnlineColor([43, 60, 61, 62, 63, 64],[240, 198, 5]);




    },
    error:function () {
        alert("request failure - initerial");
    }
});





/**
 * 节点点击事件
 */

var arrNodes = new Array();
var arrHashConnLines = new Array();
var ajaxData1 = {};

arrNodes = [nodeObj2_1, nodeObj2_2, nodeObj2_3];
arrHashConnLines = [0, 1, 2]; // hashConnLines数组的下标值
ajaxData1.data = {roles:['0级', '一级', '二级', '三级', 'ka', '医院', '药店', '第三终端', '连锁药店', '无性质']}
ajaxData1.callback = function (r) {

    for (var i in r) {
        r[i].gross = roundDecimal(r[i].gross / 1000, 0);
    }

    $('span[role-percent]').show();

    $('p[role-name=factory]').html('销售额:' + r[0].gross);
    $('p[role-name=primary]').html('销售额:' + r[0].gross);
    $('p[role-name=secondary]').html('销售额:' + r[1].gross);
    $('p[role-name=third]').html('销售额:' + r[2].gross);
    // $('p[role-name=third]').html('销售额:'+ 7223);
    $('p[role-name=ka]').html('销售额:' + r[3].gross);
    $('p[role-name=hospital]').html('销售额:' + r[4].gross);
    $('p[role-name=drugstore]').html('销售额:' + r[5].gross);
    $('p[role-name=terminal]').html('销售额:' + r[6].gross);
    $('p[role-name=linkage]').html('销售额:' + r[7].gross);
    $('p[role-name=unrecognition]').html('销售额:' + r[8].gross);

    $('span[role-percent=rp21_31]').html('销售占比:' + tmpPercent[0].percent);
    $('span[role-percent=rp21_41]').html('销售占比:' + tmpPercent[1].percent);
    $('span[role-percent=rp21_42]').html('销售占比:' + tmpPercent[2].percent);

    $('span[role-percent=rp31_41]').html('销售占比:' + tmpPercent[3].percent);
    $('span[role-percent=rp31_42]').html('销售占比:' + tmpPercent[4].percent);

    $('span[role-percent=rp41_42]').html('销售占比:' + tmpPercent[5].percent);

    $('span[role-percent=rp21_5x]').html('销售占比:' + tmpPercent[6].percent);
    $('span[role-percent=rp31_5x]').html('销售占比:' + tmpPercent[7].percent);
    $('span[role-percent=rp41_5x]').html('销售占比:' + tmpPercent[8].percent);

    $('span[role-percent=rp51]').html('销售占比:' + tmpPercent[9].percent);
    $('span[role-percent=rp54]').html('销售占比:' + tmpPercent[10].percent);
    $('span[role-percent=rp53]').html('销售占比:' + tmpPercent[11].percent);
    $('span[role-percent=rp52]').html('销售占比:' + tmpPercent[12].percent);
    $('span[role-percent=rp55]').html('销售占比:' + tmpPercent[13].percent);
}
nodeObj1_1.onClickNode(arrNodes, arrHashConnLines, [104, 5, 240], ajaxData1);

var ajaxData2 = {}
arrNodes = [nodeObj3_1, nodeObj4_1, nodeObj4_2, nodeObj5_1, nodeObj5_2, nodeObj5_3, nodeObj5_4, nodeObj5_5];
arrHashConnLines = [10, 11, 12, 13, 60, 61, 62, 63, 64]; // hashConnLines数组的下标值
ajaxData2.data = {roles:['一级', '二级', '三级', 'ka', '医院', '药店', '第三终端', '连锁药店', '无性质']}
ajaxData2.callback = function (r) {

    for (var i in r) {
        r[i].gross = roundDecimal(r[i].gross / 1000, 0);
    }

    $('p[role-name=factory]').html('销售额:' + r[0].gross);
    $('p[role-name=primary]').html('销售额:' + r[0].gross);
    $('p[role-name=secondary]').html('购进额:' + r[1].gross);
    $('p[role-name=third]').html('购进额:' + r[2].gross);
    $('p[role-name=ka]').html('购进额:' + r[3].gross);
    $('p[role-name=hospital]').html('购进额:' + r[4].gross);
    $('p[role-name=drugstore]').html('购进额:' + r[5].gross);
    $('p[role-name=terminal]').html('购进额:' + r[6].gross);
    $('p[role-name=linkage]').html('购进额:' + r[7].gross);
    $('p[role-name=unrecognition]').html('购进额:' + r[8].gross);


    $('span[role-percent]').hide();
    var label = '销售占比：' + tmpPercent[0].percent;
    $('span[role-percent=rp21_31]').toggle().html(label);

    label = '销售占比：' + tmpPercent[2].percent;
    $('span[role-percent=rp21_42]').toggle().html(label);

    label = '销售占比：' + tmpPercent[1].percent;
    $('span[role-percent=rp21_41]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[4].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp51]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[5].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp53]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[6].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp52]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[7].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp54]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[8].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp55]').toggle().html(label);


}
nodeObj2_1.onClickNode(arrNodes, arrHashConnLines, [55, 182, 5], ajaxData2);

var ajaxData3 = {}
arrNodes = [nodeObj4_1, nodeObj4_2, nodeObj5_1, nodeObj5_2, nodeObj5_3, nodeObj5_4, nodeObj5_5];
arrHashConnLines = [30, 31, 32, 60, 61, 62, 63, 64]; // hashConnLines数组的下标值
ajaxData3.data = {roles:['二级', '三级', 'ka', '医院', '药店', '第三终端', '连锁药店', '无性质']}
ajaxData3.callback = function (r) {

    for (var i in r) {
        r[i].gross = roundDecimal(r[i].gross / 1000, 0);
    }
    //  $('p[role-name=factory]').html('销售额:' + r[0].gross);
    // $('p[role-name=primary]').html('销售额:' + r[0].gross);
    $('p[role-name=secondary]').html('销售额:' + r[0].gross);
    $('p[role-name=third]').html('购进额:' + r[1].gross);
    $('p[role-name=ka]').html('购进额:' + r[2].gross);
    $('p[role-name=hospital]').html('购进额:' + r[3].gross);
    $('p[role-name=drugstore]').html('购进额:' + r[4].gross);
    $('p[role-name=terminal]').html('购进额:' + r[5].gross);
    $('p[role-name=linkage]').html('购进额:' + r[6].gross);
    $('p[role-name=unrecognition]').html('购进额:' + r[7].gross);

    $('span[role-percent]').hide();
    var label = '销售占比：' + roundDecimal((r[1].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp31_41]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[2].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp31_42]').toggle().html(label);
    //$('span[role-percent=rp21_41]').toggle();

    label = '销售占比：' + roundDecimal((r[3].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp51]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[4].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp53]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[5].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp52]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[6].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp54]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[7].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp55]').toggle().html(label);
}
nodeObj3_1.onClickNode(arrNodes, arrHashConnLines, [240, 5, 16], ajaxData3);

var ajaxData4 = {}
arrNodes = [nodeObj4_1, nodeObj4_2, nodeObj5_1, nodeObj5_2, nodeObj5_3, nodeObj5_4, nodeObj5_5];
arrHashConnLines = [40, 41, 60, 61, 62, 63, 64]; // hashConnLines数组的下标值
ajaxData4.data = {roles:['三级', 'ka', '医院', '药店', '第三终端', '连锁药店', '无性质']}
ajaxData4.callback = function (r) {
    //  alert(r[1].gross);
    //  $('p[role-name=factory]').html('销售额:' + r[0].gross);
    // $('p[role-name=primary]').html('销售额:' + r[0].gross);
    //   $('p[role-name=secondary]').html('销售额:' + r[0].gross);

    for (var i in r) {
        r[i].gross = roundDecimal(r[i].gross / 1000, 0);
    }
    $('p[role-name=third]').html('销售额:' + r[0].gross);
    $('p[role-name=ka]').html('购进额:' + r[1].gross);
    $('p[role-name=hospital]').html('购进额:' + r[2].gross);
    $('p[role-name=drugstore]').html('购进额:' + r[3].gross);
    $('p[role-name=terminal]').html('购进额:' + r[4].gross);
    $('p[role-name=linkage]').html('购进额:' + r[5].gross);
    $('p[role-name=unrecognition]').html('购进额:' + r[6].gross);

    $('span[role-percent]').hide();

    var label = '销售占比：' + roundDecimal((r[1].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp41_42]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[2].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp51]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[3].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp53]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[4].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp52]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[5].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp54]').toggle().html(label);

    label = '销售占比：' + roundDecimal((r[6].gross / r[0].gross) * 100, 2) + '%';
    $('span[role-percent=rp55]').toggle().html(label);
}
nodeObj4_1.onClickNode(arrNodes, arrHashConnLines, [240, 198, 5], ajaxData4);


var ajaxData5 = {}
arrNodes = [nodeObj4_2, nodeObj5_1, nodeObj5_2, nodeObj5_3, nodeObj5_4, nodeObj5_5];
arrHashConnLines = [43, 60, 61, 62, 63, 64]; // hashConnLines数组的下标值
ajaxData5.data = {roles:['ka']}
ajaxData5.callback = function (r) {

    $('p[role-name=ka]').html('购进额:' + tmpTotality[3].gross);
}
nodeObj4_2.onClickNode(arrNodes, arrHashConnLines, [240, 198, 5], ajaxData5);


/**
 * 生成链接线标签
 */

createNodeLabel("rp1_21", "销售占比:100%", [47, 89]);
createNodeLabel("rp1_22", "销售占比:0.00%", [735, 89]);
createNodeLabel("rp1_23", "销售占比:0.00%", [911, 89]);


createNodeLabel("rp21_31", "销售占比:0.00%", [402, 217]);
createNodeLabel("rp21_41", "销售占比:0.00%", [150, 361]);
createNodeLabel("rp21_42", "销售占比:0.00%", [692, 258]);
createNodeLabel("rp21_5x", "销售占比:0.00%", [146, 241]);

createNodeLabel("rp31_41", "销售占比:0.00%", [259, 331]);
createNodeLabel("rp31_42", "销售占比:0.00%", [503, 300]);
createNodeLabel("rp31_5x", "销售占比:0.00%", [148, 302]);

createNodeLabel("rp41_42", "销售占比:0.00%", [462, 358]);
createNodeLabel("rp41_5x", "销售占比:0.00%", [277, 437]);
createNodeLabel("rp42_5x", "销售占比:0.00%", [690, 436]);


createNodeLabel("rp51", "销售占比:0.00%", [42, 609]);
createNodeLabel("rp52", "销售占比:0.00%", [278, 609]);
createNodeLabel("rp53", "销售占比:0.00%", [478, 609]);
createNodeLabel("rp54", "销售占比:0.00%", [688, 609]);
createNodeLabel("rp55", "销售占比:0.00%", [887, 609]);

/*workflow.addFigure(new Label("销售占比:29.31%"), 42, 609);
 workflow.addFigure(new Label("销售占比:11.12%"), 278, 609);
 workflow.addFigure(new Label("销售占比:42.31%"), 478, 609);
 workflow.addFigure(new Label("销售占比:0.14%"), 688, 609);
 workflow.addFigure(new Label("销售占比:17.31%"), 887, 609);*/


