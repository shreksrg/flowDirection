SKL78xxStart = function (params) {
    this.title = params.title;
    this.url = params.url;
    this.connodes = params.connodes;
    this.counterLab = params.counterLab
    if (!this.counterLab) {
        this.counterLab = "销售量：0"
    }
    if (!this.url) {
        this.url = "img/btn-roleup.png";
    }
    Node.call(this);
    this.inputPort = null;
    this.outputPort = null;


    this.setDimension(138, 69);
    this.setColor(null);


    /*this.setColor(new Color(255, 128, 255));
     this.setBackgroundColor(new Color(245, 245, 255));
     this.setDimension(120, 36);*/
};

SKL78xxStart.prototype = new Node;
SKL78xxStart.prototype.type = "SKL78xxStart";
SKL78xxStart.prototype.createHTMLElement = function () {

    var item = Node.prototype.createHTMLElement.call(this);
    this.img = document.createElement("img");
    this.img.style.position = "absolute";
    this.img.style.left = "0px";
    this.img.style.top = "0px";
    this.img.src = this.url;
    item.appendChild(this.img);
    this.d = document.createElement("div");
    this.d.setAttribute("node-role", "distribution");
    this.d.style.position = "absolute";
    this.d.style.left = "0px";
    this.d.style.top = "0px";
    this.d.innerHTML = '<p class="role-name">' + this.title + '</p><p class="role-statistics">' + this.counterLab + '</p>';
    this.d.style.textAlign = "center";
    this.d.style.paddingTop = "12px";
    this.d.style.overflow = "hidden";
    //this.d.style.background = "url(btn-role-style1.png) no-repeat";
    item.appendChild(this.d);


    item.style.left = this.x + "px";
    item.style.top = this.y + "px";
    return item;


    /* var item = CompartmentFigure.prototype.createHTMLElement.call(this);
     this.label = document.createElement("div");
     this.label.setAttribute("node-role", "distribution");
     //this.label.id = "sk-u23";
     this.label.style.position = "absolute";
     this.label.style.left = "0px";
     this.label.style.top = "5px";
     this.label.style.width = "100%";
     //this.label.style.height = (this.getHeight() - 10) + "px";
     this.label.style.height = "100%";
     this.label.style.font = "normal 10px verdana";
     this.label.style.textAlign = "center";
     this.label.style.fontWeight = "bold";
     this.label.style.borderWidth = "2px";
     this.label.style.webkitBorderRadius = "15px";
     this.textNode = document.createTextNode(this.title);
     this.label.appendChild(this.textNode);

     item.appendChild(this.label);*/
    /* this.slot = document.createElement("img");
     this.slot.src = "slot.png";
     this.slot.style.position = "absolute";
     this.slot.style.left = "0px";
     this.slot.style.top = (this.getHeight() / 2 - 7) + "px";
     item.appendChild(this.slot);*/
    // return item;
};

SKL78xxStart.prototype.setDimension = function (w, h) {
    Node.prototype.setDimension.call(this, w, h);
    if (this.d != null) {
        this.d.style.width = this.width + "px";
        this.d.style.height = this.height + "px";
    }
    if (this.img != null) {
        this.img.width = this.width;
        this.img.height = this.height;
    }

};


SKL78xxStart.prototype.setWorkflow = function (_4422) {
    Node.prototype.setWorkflow.call(this, _4422);
    if (_4422 != null && this.outputPort == null) {
        for (var i in this.connodes) {
            switch (this.connodes[i]) {
                case "lc":
                    this.op_lc = new OutputPort();
                    this.op_lc.setMaxFanOut(5);
                    this.op_lc.setWorkflow(_4422);
                    this.op_lc.setHideIfConnected(true);
                    this.op_lc.setName("op_lc");
                    this.op_lc.setBackgroundColor(new Color(245, 115, 115));
                    this.addPort(this.op_lc, 0, this.height / 2);
                    break;
                case "rc":
                    this.op_rc = new OutputPort();
                    this.op_rc.setMaxFanOut(5);
                    this.op_rc.setWorkflow(_4422);
                    this.op_rc.setHideIfConnected(true);
                    this.op_rc.setName("op_rc");
                    this.op_rc.setBackgroundColor(new Color(245, 115, 115));
                    this.addPort(this.op_rc, this.width, this.height / 2);
                    break;
                case "tc":
                    this.op_tc = new OutputPort();
                    this.op_tc.setMaxFanOut(5);
                    this.op_tc.setWorkflow(_4422);
                    this.op_tc.setHideIfConnected(true);
                    this.op_tc.setName("op_tc");
                    this.op_tc.setBackgroundColor(new Color(245, 115, 115));
                    this.addPort(this.op_tc, this.width / 2, 0);
                    break;
                case "bc":
                    this.op_bc = new OutputPort();
                    this.op_bc.setMaxFanOut(5);
                    this.op_bc.setWorkflow(_4422);
                    this.op_bc.setHideIfConnected(true);
                    this.op_bc.setName("op_bc");
                    this.op_bc.setBackgroundColor(new Color(245, 115, 115));
                    this.addPort(this.op_bc, this.width / 2, this.height);
                    break;
                default:

            }


        }

    }
};


SKL78xxEnd = function () {
    Node.call(this);
    this.inputPort = null;

    this.setColor(new Color(255, 128, 255));
    this.setBackgroundColor(new Color(245, 245, 255));
    this.setDimension(250, 50);
};
SKL78xxEnd.prototype = new Node;
SKL78xxEnd.prototype.type = "SKL78xxEnd";
SKL78xxEnd.prototype.setWorkflow = function (_3241) {
    Node.prototype.setWorkflow.call(this, _3241);
    if (_3241 != null && this.inputPort == null) {
        this.inputPort = new InputPort();
        this.inputPort.setWorkflow(_3241);
        this.inputPort.setBackgroundColor(new Color(115, 115, 245));
        this.inputPort.setColor(null);
        this.addPort(this.inputPort, 0, this.height / 2);
    }
};


SKL78xxOval = function () {
    Oval.call(this);
    //  Node.call(this);
    this.inputPort = null;

    this.setColor(new Color(255, 128, 255));
    this.setBackgroundColor(new Color(245, 245, 255));
    this.setDimension(0, 0);
};
SKL78xxOval.prototype = new Oval;
SKL78xxOval.prototype.type = "SKL78xxOval";
SKL78xxOval.prototype.setWorkflow = function (_3241) {
    Oval.prototype.setWorkflow.call(this, _3241);
    if (_3241 != null && this.inputPort == null) {
        this.inputPort = new InputPort();
        this.inputPort.setWorkflow(_3241);
        this.inputPort.setBackgroundColor(new Color(115, 115, 245));
        this.inputPort.setColor(null);
        this.addPort(this.inputPort, this.width / 2, 0);
    }
};


MyOutputPort = function (_3079) {
    OutputPort.call(this, _3079);
};
MyOutputPort.prototype = new OutputPort;
MyOutputPort.prototype.onDrop = function (port) {
    if (this.getMaxFanOut() <= this.getFanOut()) {
        return;
    }
    if (this.parentNode.id == port.parentNode.id) {
    } else {
        var _307b = new CommandConnect(this.parentNode.workflow, this, port);
        _307b.setConnection(new DecoratedConnection());
        this.parentNode.workflow.getCommandStack().execute(_307b);
    }
};


MyInputPort = function (_3674) {
    InputPort.call(this, _3674);
};
MyInputPort.prototype = new InputPort;
MyInputPort.prototype.onDrop = function (port) {
    if (port.getMaxFanOut && port.getMaxFanOut() <= port.getFanOut()) {
        return;
    }
    if (this.parentNode.id == port.parentNode.id) {
    } else {
        var _3676 = new CommandConnect(this.parentNode.workflow, port, this);
        _3676.setConnection(new DecoratedConnection());
        this.parentNode.workflow.getCommandStack().execute(_3676);
    }
};


PolygonConnectionDecorator = function () {
};
PolygonConnectionDecorator.prototype = new ConnectionDecorator;
PolygonConnectionDecorator.prototype.paint = function (g) {
    g.setColor(new Color(128, 255, 255));
    //  g.fillPolygon([0, 15, 30, 15, 3], [0, 5, 0, -5, 0]);
    g.fillPolygon([0, 10, 10], [0, 5, -5]);
    g.setColor(new Color(128, 128, 255));
    g.setStroke(1);
    // g.drawPolygon([0, 15, 30, 15, 3], [0, 5, 0, -5, 0]);
    g.drawPolygon([0, 10, 10], [0, 5, -5]);
};

var c = new Connection();
function createConnectLine(n, l) {
    c = new Connection();
    c.setSource(n[0].getPort(l[0]));
    c.setTarget(n[1].getPort(l[1]));
    c.setTargetDecorator(new PolygonConnectionDecorator());
    workflow.addFigure(c);
}