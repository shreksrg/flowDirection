/**
 * Created with JetBrains PhpStorm.
 * User: shiruigang
 * Date: 12-7-12
 * Time: 下午1:46
 * To change this template use File | Settings | File Templates.
 */

var workflow = new Workflow("paintarea");

var nodeObj1_1 = new SKL78xxStart({title:'药厂', connodes:['bc'],counterLab:'销售量:19,888'});
workflow.addFigure(nodeObj1_1, 398, 18);

var nodeObj2_1 = new SKL78xxStart({title:'一级商', connodes:['tc', 'rc', 'bc'],counterLab:'销售量:19,888'});
workflow.addFigure(nodeObj2_1, 25, 150);


var nodeObj2_2 = new SKL78xxStart({title:'未识别', connodes:['tc']});
workflow.addFigure(nodeObj2_2, 710, 150);

var nodeObj2_3 = new SKL78xxStart({title:'未采集', connodes:['tc']});
workflow.addFigure(nodeObj2_3, 880, 150);

var nodeObj3_1 = new SKL78xxStart({title:'二级商', connodes:['tc', 'bc', 'lc', 'rc'],counterLab:'销售量:15,544'});
workflow.addFigure(nodeObj3_1, 320, 256);

var nodeObj4_1 = new SKL78xxStart({title:'三级商', connodes:['bc', 'tc','lc','rc'],counterLab:'销售量:640'});
workflow.addFigure(nodeObj4_1, 320, 356);

var nodeObj4_2 = new SKL78xxStart({title:'KA总部', connodes:['tc', 'bc','lc'],counterLab:'销售量:678'});
workflow.addFigure(nodeObj4_2, 568, 356);

var nodeObj5_1 = new SKL78xxStart({title:'医院', connodes:['tc'],counterLab:'购进量:4,830'});
workflow.addFigure(nodeObj5_1, 25, 532);

var nodeObj5_2 = new SKL78xxStart({title:'第三终端', connodes:['tc'],counterLab:'购进量:1,832'});
workflow.addFigure(nodeObj5_2, 247, 532);

var nodeObj5_3 = new SKL78xxStart({title:'药店', connodes:['tc'],counterLab:'购进量:6,971'});
workflow.addFigure(nodeObj5_3, 453, 532);

var nodeObj5_4 = new SKL78xxStart({title:'连锁药店', connodes:['tc'],counterLab:'购进量:23'});
workflow.addFigure(nodeObj5_4, 664, 532);

var nodeObj5_5 = new SKL78xxStart({title:'无法识别', connodes:['tc'],counterLab:'购进量:0'});
workflow.addFigure(nodeObj5_5, 865, 532);

/*var nodeOval = new SKL78xxOval();
 workflow.addFigure(nodeOval, 190, 462);*/

createConnectLine([nodeObj1_1, nodeObj2_1], ['op_bc', 'op_tc']);
createConnectLine([nodeObj1_1, nodeObj2_2], ['op_bc', 'op_tc']);
createConnectLine([nodeObj1_1, nodeObj2_3], ['op_bc', 'op_tc']);

createConnectLine([nodeObj2_1, nodeObj3_1], ['op_rc', 'op_tc']);
createConnectLine([nodeObj2_1, nodeObj4_1], ['op_bc', 'op_lc']);
createConnectLine([nodeObj2_1, nodeObj4_2], ['op_rc', 'op_tc']);
createConnectLine([nodeObj2_1, nodeObj5_1], ['op_bc', 'op_tc']);

createConnectLine([nodeObj3_1, nodeObj4_1], ['op_bc', 'op_tc']);
createConnectLine([nodeObj3_1, nodeObj4_2], ['op_rc', 'op_tc']);
createConnectLine([nodeObj3_1, nodeObj5_1], ['op_lc', 'op_tc']);

createConnectLine([nodeObj4_1, nodeObj4_2], ['op_rc', 'op_lc']);
createConnectLine([nodeObj4_1, nodeObj5_1], ['op_bc', 'op_tc']);
createConnectLine([nodeObj4_1, nodeObj5_2], ['op_bc', 'op_tc']);
createConnectLine([nodeObj4_1, nodeObj5_3], ['op_bc', 'op_tc']);
createConnectLine([nodeObj4_1, nodeObj5_4], ['op_bc', 'op_tc']);
createConnectLine([nodeObj4_1, nodeObj5_5], ['op_bc', 'op_tc']);
createConnectLine([nodeObj4_2, nodeObj5_5], ['op_bc', 'op_tc']);





workflow.addFigure(new Label("销售占比:100%"), 47, 89);
workflow.addFigure(new Label("销售占比:0%"), 735, 89);
workflow.addFigure(new Label("销售占比:0%"), 911, 89);
workflow.addFigure(new Label("销售占比:11.91%"), 108, 241);
workflow.addFigure(new Label("销售占比:87.11%"), 402, 217);
workflow.addFigure(new Label("销售占比:0.98%"), 651, 318);

workflow.addFigure(new Label("销售占比:87.14%"), 111, 302);
workflow.addFigure(new Label("销售占比:10.23%"), 259, 331);
workflow.addFigure(new Label("销售占比:2.62%"), 503, 300);


workflow.addFigure(new Label("销售占比:0.00%"), 112, 361);
workflow.addFigure(new Label("销售占比:88.28%"), 277, 437);
workflow.addFigure(new Label("销售占比:11.72%"), 462, 358);
workflow.addFigure(new Label("销售占比:0.00%"), 656, 436);

workflow.addFigure(new Label("销售占比:29.31%"), 42, 609);
workflow.addFigure(new Label("销售占比:11.12%"), 278, 609);
workflow.addFigure(new Label("销售占比:42.31%"), 478, 609);
workflow.addFigure(new Label("销售占比:0.14%"), 688, 609);
workflow.addFigure(new Label("销售占比:17.31%"), 887, 609);

/*c = new Connection();
 c.setSource(nodeObj2_1.op_bc);
 c.setTarget(nodeOval.inputPort);
 workflow.addFigure(c);*/
