/**
 * Created with JetBrains PhpStorm.
 * User: shiruigang
 * Date: 12-7-12
 * Time: 下午1:46
 * To change this template use File | Settings | File Templates.
 */

var workflow = new Workflow("paintarea");

var nodeObj1_1 = new SKL78xxStart({title:'药厂', connodes:['bc'], counterLab:'销售量:19,888'});
workflow.addFigure(nodeObj1_1, 398, 18);

var nodeObj2_1 = new SKL78xxStart({title:'一级商', connodes:['tc', 'rc', 'bc'], counterLab:'销售量:19,888'});
workflow.addFigure(nodeObj2_1, 65, 150);


var nodeObj2_2 = new SKL78xxStart({title:'未识别', connodes:['tc']});
workflow.addFigure(nodeObj2_2, 710, 150);

var nodeObj2_3 = new SKL78xxStart({title:'未采集', connodes:['tc']});
workflow.addFigure(nodeObj2_3, 880, 150);

var nodeObj3_1 = new SKL78xxStart({title:'二级商', connodes:['tc', 'bc', 'lc', 'rc'], counterLab:'销售量:15,544'});
workflow.addFigure(nodeObj3_1, 320, 256);

var nodeObj4_1 = new SKL78xxStart({title:'三级商', connodes:['bc', 'tc', 'lc', 'rc'], counterLab:'销售量:640'});
workflow.addFigure(nodeObj4_1, 320, 356);

var nodeObj4_2 = new SKL78xxStart({title:'KA总部', connodes:['tc', 'bc', 'lc'], counterLab:'销售量:678'});
workflow.addFigure(nodeObj4_2, 568, 356);

var nodeObj5_1 = new SKL78xxStart({title:'医院', connodes:['tc'], counterLab:'购进量:4,830'});
workflow.addFigure(nodeObj5_1, 25, 532);

var nodeObj5_2 = new SKL78xxStart({title:'第三终端', connodes:['tc'], counterLab:'购进量:1,832'});
workflow.addFigure(nodeObj5_2, 247, 532);

var nodeObj5_3 = new SKL78xxStart({title:'药店', connodes:['tc'], counterLab:'购进量:6,971'});
workflow.addFigure(nodeObj5_3, 453, 532);

var nodeObj5_4 = new SKL78xxStart({title:'连锁药店', connodes:['tc'], counterLab:'购进量:23'});
workflow.addFigure(nodeObj5_4, 664, 532);

var nodeObj5_5 = new SKL78xxStart({title:'无法识别', connodes:['tc'], counterLab:'购进量:0'});
workflow.addFigure(nodeObj5_5, 865, 532);

var nodeObj6_1 = new SKL78xxNode({connodes:['rc', 'bc']});
workflow.addFigure(nodeObj6_1, 92, 477);

var nodeObj6_2 = new SKL78xxNode({connodes:['tc']});
workflow.addFigure(nodeObj6_2, 132, 477);

var nodeObj6_3 = new SKL78xxNode({connodes:['tc']});
workflow.addFigure(nodeObj6_3, 387, 477);

var nodeObj6_4 = new SKL78xxNode({connodes:['tc']});
workflow.addFigure(nodeObj6_4, 635, 477);


hashConnLines[0] = {node:[nodeObj1_1, nodeObj2_1], port:['op_bc', 'op_tc']}
hashConnLines[1] = {node:[nodeObj1_1, nodeObj2_2], port:['op_bc', 'op_tc']}
hashConnLines[2] = {node:[nodeObj1_1, nodeObj2_3], port:['op_bc', 'op_tc']}

hashConnLines[10] = {node:[nodeObj2_1, nodeObj3_1], port:['op_rc', 'op_tc']}
hashConnLines[11] = {node:[nodeObj2_1, nodeObj4_1], port:['op_bc', 'op_lc']}
hashConnLines[12] = {node:[nodeObj2_1, nodeObj4_2], port:['op_rc', 'op_tc']}
hashConnLines[13] = {node:[nodeObj2_1, nodeObj6_2], port:['op_bc', 'op_tc']}


hashConnLines[30] = {node:[nodeObj3_1, nodeObj4_1], port:['op_bc', 'op_tc']}
hashConnLines[31] = {node:[nodeObj3_1, nodeObj4_2], port:['op_rc', 'op_tc']}
hashConnLines[32] = {node:[nodeObj3_1, nodeObj5_1], port:['op_lc', 'op_tc']}

hashConnLines[40] = {node:[nodeObj4_1, nodeObj4_2], port:['op_rc', 'op_lc']}
hashConnLines[41] = {node:[nodeObj4_1, nodeObj6_3], port:['op_bc', 'op_tc']}
hashConnLines[43] = {node:[nodeObj4_2, nodeObj6_4], port:['op_bc', 'op_tc']}

hashConnLines[60] = {node:[nodeObj6_1, nodeObj5_1], port:['op_bc', 'op_tc']}
hashConnLines[61] = {node:[nodeObj6_1, nodeObj5_2], port:['op_rc', 'op_tc']}
hashConnLines[62] = {node:[nodeObj6_1, nodeObj5_3], port:['op_rc', 'op_tc']}
hashConnLines[63] = {node:[nodeObj6_1, nodeObj5_4], port:['op_rc', 'op_tc']}
hashConnLines[64] = {node:[nodeObj6_1, nodeObj5_5], port:['op_rc', 'op_tc']}


/*createConnectLine([nodeObj1_1, nodeObj2_1], ['op_bc', 'op_tc']);
 createConnectLine([nodeObj1_1, nodeObj2_2], ['op_bc', 'op_tc']);
 createConnectLine([nodeObj1_1, nodeObj2_3], ['op_bc', 'op_tc']);*/

/*hashConnLines[3]= {node:[nodeObj2_1, nodeObj3_1],port:['op_rc', 'op_tc']}
 hashConnLines[4]= {node:[nodeObj2_1, nodeObj4_1],port:['op_bc', 'op_lc']}
 hashConnLines[5]= {node:[nodeObj2_1, nodeObj4_2],port:['op_rc', 'op_tc']}
 hashConnLines[6]= {node:[nodeObj2_1, nodeObj5_1],port:['op_bc', 'op_tc']}
 hashConnLines[7]= {node:[nodeObj2_1, nodeObj5_2],port:['op_bc', 'op_tc']}
 hashConnLines[8]= {node:[nodeObj2_1, nodeObj5_3],port:['op_bc', 'op_tc']}*/
/*createConnectLine([nodeObj2_1, nodeObj3_1], ['op_rc', 'op_tc']);
 createConnectLine([nodeObj2_1, nodeObj4_1], ['op_bc', 'op_lc']);
 createConnectLine([nodeObj2_1, nodeObj4_2], ['op_rc', 'op_tc']);
 createConnectLine([nodeObj2_1, nodeObj5_1], ['op_bc', 'op_tc']);
 createConnectLine([nodeObj2_1, nodeObj5_2], ['op_bc', 'op_tc']);
 createConnectLine([nodeObj2_1, nodeObj5_3], ['op_bc', 'op_tc']);

 createConnectLine([nodeObj3_1, nodeObj4_1], ['op_bc', 'op_tc']);
 createConnectLine([nodeObj3_1, nodeObj4_2], ['op_rc', 'op_tc']);
 //createConnectLine([nodeObj3_1, nodeObj5_1], ['op_lc', 'op_tc']);

 createConnectLine([nodeObj4_1, nodeObj4_2], ['op_rc', 'op_lc']);
 createConnectLine([nodeObj4_1, nodeObj5_1], ['op_bc', 'op_tc']);
 createConnectLine([nodeObj4_1, nodeObj5_2], ['op_bc', 'op_tc']);
 createConnectLine([nodeObj4_1, nodeObj5_3], ['op_bc', 'op_tc']);
 createConnectLine([nodeObj4_1, nodeObj5_4], ['op_bc', 'op_tc']);
 createConnectLine([nodeObj4_1, nodeObj5_5], ['op_bc', 'op_tc']);
 createConnectLine([nodeObj4_2, nodeObj5_5], ['op_bc', 'op_tc']);

 createConnectLine([nodeObj6_1, nodeObj5_5], ['op_rc', 'op_tc']);
 createConnectLine([nodeObj6_1, nodeObj5_4], ['op_rc', 'op_tc']);
 createConnectLine([nodeObj6_1, nodeObj5_3], ['op_rc', 'op_tc']);
 createConnectLine([nodeObj6_1, nodeObj5_2], ['op_rc', 'op_tc']);*/

/**
 * 绘制连接线
 */

for (var i in hashConnLines) {
    hashConnLines[i].connectObj = createConnectLine(hashConnLines[i].node, hashConnLines[i].port);
}


/**
 * 节点点击事件
 */
var arrNodes = new Array();
var arrHashConnLines = new Array();

arrNodes = [nodeObj2_1, nodeObj2_2, nodeObj2_3];
arrHashConnLines = [0, 1, 2]; // hashConnLines数组的下标值
nodeObj1_1.onClickNode(arrNodes, arrHashConnLines,[104, 5, 240]);


arrNodes = [nodeObj3_1, nodeObj4_1, nodeObj4_2, nodeObj5_1, nodeObj5_2, nodeObj5_3, nodeObj5_4, nodeObj5_5];
arrHashConnLines = [10, 11, 12, 13, 60, 61, 62, 63, 64]; // hashConnLines数组的下标值
nodeObj2_1.onClickNode(arrNodes, arrHashConnLines,[55, 182, 5]);

arrNodes = [nodeObj4_1, nodeObj4_2, nodeObj5_1, nodeObj5_2, nodeObj5_3, nodeObj5_4, nodeObj5_5];
arrHashConnLines = [30, 31, 32, 60, 61, 62, 63, 64]; // hashConnLines数组的下标值
nodeObj3_1.onClickNode(arrNodes, arrHashConnLines,[240, 5, 16]);

arrNodes = [nodeObj4_1, nodeObj4_2, nodeObj5_1, nodeObj5_2, nodeObj5_3, nodeObj5_4, nodeObj5_5];
arrHashConnLines = [40, 41, 60, 61, 62, 63, 64]; // hashConnLines数组的下标值
nodeObj4_1.onClickNode(arrNodes, arrHashConnLines,[240, 198, 5]);

arrNodes = [nodeObj4_2, nodeObj5_1, nodeObj5_2, nodeObj5_3, nodeObj5_4, nodeObj5_5];
arrHashConnLines = [43, 60, 61, 62, 63, 64]; // hashConnLines数组的下标值
nodeObj4_2.onClickNode(arrNodes, arrHashConnLines,[240, 198, 5]);

/*
 nodeObj2_1.onClicksetRelateHighing([nodeObj3_1, nodeObj4_1, nodeObj4_2, nodeObj5_1, nodeObj5_2, nodeObj5_3, nodeObj5_4, nodeObj5_5]);
 nodeObj3_1.onClicksetRelateHighing([nodeObj4_1, nodeObj4_2, nodeObj5_1, nodeObj5_2, nodeObj5_3, nodeObj5_4, nodeObj5_5]);
 nodeObj4_1.onClicksetRelateHighing([nodeObj4_1, nodeObj4_2, nodeObj5_1, nodeObj5_2, nodeObj5_3, nodeObj5_4, nodeObj5_5]);
 nodeObj4_2.onClicksetRelateHighing([nodeObj4_2, nodeObj5_1, nodeObj5_2, nodeObj5_3, nodeObj5_4, nodeObj5_5]);
 */


workflow.addFigure(new Label("销售占比:100%"), 47, 89);
workflow.addFigure(new Label("销售占比:0%"), 735, 89);
workflow.addFigure(new Label("销售占比:0%"), 911, 89);
workflow.addFigure(new Label("销售占比:11.91%"), 146, 241);
workflow.addFigure(new Label("销售占比:87.11%"), 402, 217);
workflow.addFigure(new Label("销售占比:0.98%"), 651, 318);

workflow.addFigure(new Label("销售占比:87.14%"), 148, 302);
workflow.addFigure(new Label("销售占比:10.23%"), 259, 331);
workflow.addFigure(new Label("销售占比:2.62%"), 503, 300);


workflow.addFigure(new Label("销售占比:0.00%"), 150, 361);
workflow.addFigure(new Label("销售占比:88.28%"), 277, 437);
workflow.addFigure(new Label("销售占比:11.72%"), 462, 358);
workflow.addFigure(new Label("销售占比:0.00%"), 656, 436);

workflow.addFigure(new Label("销售占比:29.31%"), 42, 609);
workflow.addFigure(new Label("销售占比:11.12%"), 278, 609);
workflow.addFigure(new Label("销售占比:42.31%"), 478, 609);
workflow.addFigure(new Label("销售占比:0.14%"), 688, 609);
workflow.addFigure(new Label("销售占比:17.31%"), 887, 609);


