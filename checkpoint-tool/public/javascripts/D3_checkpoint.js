// Set graph
var width = 700,
height = 700,
padding = 20;

// create an svg container
var vis = d3.select("#graph")
            .append("svg:svg")
            .attr("width", width)
            .attr("height", height);

var xScale = d3.scale.linear().domain([10, -10]).range([width - padding, padding]);
var yScale = d3.scale.linear().domain([-10, 10]).range([height - padding, padding]);

// define the y axis
var yAxis = d3.svg.axis()
            .orient("left")
            .scale(yScale);

// define the x axis
var xAxis = d3.svg.axis()
            .orient("bottom")
            .scale(xScale);

// displayed tick values
var displayValues = [-10,-9,-8,-7,-6,-5,-4,-3,-2,-1,1,2,3,4,5,6,7,8,9,10];

var xAxisPlot = vis.append("g")
            .attr("class", "axis axis--x")
            .attr("transform", "translate(0," + (height/2) + ")")
            .call(xAxis.tickSize(-height, 0, 0).tickValues(displayValues));

var yAxisPlot = vis.append("g")
            .attr("class", "axis axis--y")
            .attr("transform", "translate("+ (width/2) +",0)")
            .call(yAxis.tickSize(-width, 0, 0).tickValues(displayValues));

xAxisPlot.selectAll(".tick line")
            .attr("y1", (width - (2*padding))/2 * -1)
            .attr("y2", (width - (2*padding))/2 * 1);

yAxisPlot.selectAll(".tick line")
            .attr("x1", (width - (2*padding))/2 * -1)
            .attr("x2", (width - (2*padding))/2 * 1);

// axis labels
var xLabel = vis.append("text")
            .attr('class', 'x-label')
            .attr('text-anchor', 'middle')
            .attr('transform', 'translate('+ (width/2) +','+(height+')'))
            .text("xAxisLabel");

var yLabel = vis.append("text")
            .attr('class', 'y-label')
            .attr('text-anchor', 'middle')
            .attr('transform', 'translate(' + 10 + ', ' + (height/2) + '), rotate(-90' + ')')
            .text("yAxisLabel");

// circle size
var circleSize = 15;
var xValue = 0;
var yValue = 0;

// users graph value to be passed on to db
var userX;
var userY;

// converter for graph to pixel value
var gXConverter = d3.scale.linear().domain([10, -10]).range([width - padding, padding]);
var gYConverter = d3.scale.linear().domain([-10, 10]).range([height - padding, padding]);

// converter for pxiel to graph value
var pXConverter = d3.scale.linear().domain([width - padding, padding]).range([10, -10]);
var pYConverter = d3.scale.linear().domain([height - padding, padding]).range([-10, 10]);

// manipulates and passes data to drawCircle() and handles user value
vis.on('click', function() {
    var coords = d3.mouse(this);
    
    xValue = pXConverter(coords[0]);
    yValue = pYConverter(coords[1]);

    xValue = drawValue(xValue);
    yValue = drawValue(yValue);

    console.log('X Value is: ' + xValue);
    console.log('Y Value is: ' + yValue);

    drawCircle(gXConverter(xValue), gYConverter(yValue), circleSize);

    userX = userValue(xValue);
    userY = userValue(yValue);

    console.log('User X Value is: ' + userX);
    console.log('User Y Value is: ' + userY);
});

// draws a circle at the mouse coordinates
function drawCircle(x, y, size) {
    vis.selectAll(".click-circle").remove();
    console.log('Drawing circle at', x, y, size);
    vis.append("circle")
        .attr('class', 'click-circle')
        .attr("cx", x)
        .attr("cy", y)
        .attr("r", size);
}

// on mouse move handles drawing of transparent circle
vis.on('mousemove', function() {
    var coords = d3.mouse(this);

    var ghostXValue = pXConverter(coords[0]);
    var ghostYValue = pYConverter(coords[1]);

    ghostXValue = drawValue(ghostXValue);
    ghostYValue = drawValue(ghostYValue);

    ghostCircle(gXConverter(ghostXValue), gYConverter(ghostYValue), circleSize);
});

// draws transparent circle at the mouse coordinates
function ghostCircle(x, y, size) {
    vis.selectAll(".ghost-circle").remove();
    console.log('Ghost circle at', x, y, size);
    vis.append("circle")
        .attr('class', 'ghost-circle')
        .attr("cx", x)
        .attr("cy", y)
        .attr("r", size);
}

// rounds values to be drawn on the grid
function drawValue(z) {
    z = Math.round(z);
    //if(z > 0) {
    //	z = Math.floor(z);
    //	//z = z+0.5;
    //}
    //else {
    //	z = Math.ceil(z);
    //	//z = z-0.5;
    //}
    return z;
}

// rounds to a whole number, value to be passed on to db
function userValue(z) {
    if(z > 0) {
        z = Math.ceil(z);
    }
    else {
        z = Math.floor(z);
    }
    return z;
}