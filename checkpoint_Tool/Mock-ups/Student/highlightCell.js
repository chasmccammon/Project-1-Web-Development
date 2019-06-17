//  Script to enable highlighting of a clicked cell

var highlightLink = function() {
    var active = null,
        colour = 'red';
    if (this.attachEvent) this.attachEvent('onunload', function() {
        active = null;
    });
    return function(element) {
        if ((active != element) && element.style) {
            if (active) active.style.backgroundColor = '';
            element.style.backgroundColor = colour;
            active = element;
        }
    };
}();