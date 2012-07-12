/**
 * Created with JetBrains PhpStorm.
 * User: shiruigang
 * Date: 12-7-12
 * Time: 下午1:46
 * To change this template use File | Settings | File Templates.
 */

var workflow = new Workflow("paintarea");

var nodeObj1_1 = new SKL78xxStart({title:'厂商', connodes:['bc']});
workflow.addFigure(nodeObj1_1, 398, 18);

var nodeObj2_1 = new SKL78xxStart({title:'一级商', connodes:['tc', 'rc', 'bc']});
workflow.addFigure(nodeObj2_1, 25, 150);


var nodeObj2_2 = new SKL78xxStart({title:'未识别', connodes:['tc']});
workflow.addFigure(nodeObj2_2, 710, 150);

var nodeObj2_3 = new SKL78xxStart({title:'未采集', connodes:['tc']});
workflow.addFigure(nodeObj2_3, 880, 150);

var nodeObj3_1 = new SKL78xxStart({title:'二级商', connodes:['tc', 'bc', 'lc', 'rc']});
workflow.addFigure(nodeObj3_1, 320, 256);

var nodeObj4_1 = new SKL78xxStart({title:'三级商', connodes:['bc', 'tc']});
workflow.addFigure(nodeObj4_1, 320, 356);

var nodeObj4_2 = new SKL78xxStart({title:'KA总部', connodes:['tc', 'bc']});
workflow.addFigure(nodeObj4_2, 568, 356);

var nodeObj5_1 = new SKL78xxStart({title:'医院', connodes:['tc']});
workflow.addFigure(nodeObj5_1, 25, 532);

var nodeObj5_2 = new SKL78xxStart({title:'第三终端', connodes:['tc']});
workflow.addFigure(nodeObj5_2, 247, 532);

var nodeObj5_3 = new SKL78xxStart({title:'药店', connodes:['tc']});
workflow.addFigure(nodeObj5_3, 453, 532);

var nodeObj5_4 = new SKL78xxStart({title:'连锁药店', connodes:['tc']});
workflow.addFigure(nodeObj5_4, 664, 532);

var nodeObj5_5 = new SKL78xxStart({title:'无法识别', connodes:['tc']});
workflow.addFigure(nodeObj5_5, 865, 532);

/*var nodeOval = new SKL78xxOval();
 workflow.addFigure(nodeOval, 190, 462);*/

createConnectLine([nodeObj1_1, nodeObj2_1], ['op_bc', 'op_tc']);
createConnectLine([nodeObj1_1, nodeObj2_2], ['op_bc', 'op_tc']);
createConnectLine([nodeObj1_1, nodeObj2_3], ['op_bc', 'op_tc']);

createConnectLine([nodeObj2_1, nodeObj3_1], ['op_rc', 'op_tc']);
createConnectLine([nodeObj2_1, nodeObj4_2], ['op_rc', 'op_tc']);
createConnectLine([nodeObj2_1, nodeObj5_1], ['op_bc', 'op_tc']);

createConnectLine([nodeObj3_1, nodeObj4_1], ['op_bc', 'op_tc']);
createConnectLine([nodeObj3_1, nodeObj4_2], ['op_rc', 'op_tc']);
createConnectLine([nodeObj3_1, nodeObj5_1], ['op_lc', 'op_tc']);

createConnectLine([nodeObj4_1, nodeObj5_1], ['op_bc', 'op_tc']);
createConnectLine([nodeObj4_1, nodeObj5_2], ['op_bc', 'op_tc']);
createConnectLine([nodeObj4_1, nodeObj5_3], ['op_bc', 'op_tc']);
createConnectLine([nodeObj4_1, nodeObj5_4], ['op_bc', 'op_tc']);
createConnectLine([nodeObj4_1, nodeObj5_5], ['op_bc', 'op_tc']);
createConnectLine([nodeObj4_2, nodeObj5_5], ['op_bc', 'op_tc']);


/*c = new Connection();
 c.setSource(nodeObj2_1.op_bc);
 c.setTarget(nodeOval.inputPort);
 workflow.addFigure(c);*/
