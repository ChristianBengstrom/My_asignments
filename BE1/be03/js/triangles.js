'use strict';

var $ = function(nml) {
    return document.getElementById(nml);
}

var styler = function() {
    var text = 'rect, line, ellipse {';
    text += '  fill: #ffffff;';
    text += ' fill-opacity: 0;';
    text += ' stroke: #000000;';
    text += '  stroke-width: 1px;';
    text += '}';

    text += 'polygon {';
    text += '  fill: #ffffff;';
    text += '  fill-opacity: 0;';
    text += '  stroke: #ff0000;';
    text += '  stroke-width: 1px;';
    text += '}';
    text += 'rect:hover, polygon:hover {';
    text += ' fill: #cccccc;';
    text += '  fill-opacity: 1;';
    text += '  stroke-width: 2px;';
    text += '}';

    text += 'text {';
    text += '  font-family: monospace;';
    text += '  font-size: 16px;';
    text += '  fill: #000000;';
    text += '  fill-opacity: 1;';
    text += '  pointer-events: none;';
    text += '  text-anchor: start;';
    text += '}';
    text += '.e {';
    text += '  text-anchor: end;';
    text += '}';
    text += '.g {';
    text += '  font-size: 10px;';
    text += '}';
    text += 'h3 {';
    text += '    font-size: 1.5em;';
    text += '    font-weight: 800;';
    text += '}';
    text += 'svg {';
    text += '    margin: 2em;';
    text += '    outline: 2px solid green;';
    text += '}';
    return text;
}

var drawTriangle = function(domid, x1, y1, x2, y2, x3, y3) {
    var inf = 30;

    var xmin = x1;
    if (x2 < xmin) xmin = x2;
    if (x3 < xmin) xmin = x3;
    var xmax = x1;
    if (x2 > xmax) xmax = x2;
    if (x3 > xmax) xmax = x3;
    var ymin = y1;
    if (y2 < ymin) ymin = x2;
    if (y3 < ymin) ymin = x3;
    var ymax = y1;
    if (y2 > ymax) ymax = y2;
    if (y3 > ymax) ymax = y3;

    var xmlns = "http://www.w3.org/2000/svg";
    var w = xmax * inf + inf;
    var h = ymax * inf + inf;
    var svg = document.createElementNS(xmlns,'svg');
    svg.setAttributeNS(null, 'width', w);
    svg.setAttributeNS(null, 'height', h);
    svg.setAttributeNS(null, 'viewBox', '0 0 ' + w + ' ' + h);
    $(domid).appendChild(svg);

    var style = document.createElementNS(xmlns, 'style');
    var t = document.createTextNode(styler());
    style.appendChild(t);

    svg.appendChild(style);
    var g = document.createElementNS(xmlns, 'g');
    var poly = document.createElementNS(xmlns, 'polygon');
    poly.setAttribute('points', (x1 * inf) + ',' + (y1 * inf) + ' '+
                                (x2 * inf) + ',' + (y2 * inf) + ' ' +
                                (x3 * inf) + ',' + (y3 * inf));
    g.appendChild(poly);

    var txt = document.createElementNS(xmlns, 'text');
    txt.setAttribute('x', (x1 * inf - 10));
    txt.setAttribute('y', (y1 * inf - 6));
    t = document.createTextNode('D');
    txt.appendChild(t);
    g.appendChild(txt);

    txt = document.createElementNS(xmlns, 'text');
    txt.setAttribute('x', (x2 * inf - 10));
    txt.setAttribute('y', (y2 * inf + 16));
    t = document.createTextNode('E');
    txt.appendChild(t);
    g.appendChild(txt);

    txt = document.createElementNS(xmlns, 'text');
    txt.setAttribute('x', (x3 * inf + 6));
    txt.setAttribute('y', (y3 * inf - 6));
    t = document.createTextNode('F');
    txt.appendChild(t);
    g.appendChild(txt);

    svg.appendChild(g);

}
