var notify = require('gulp-notify');

module.exports = function() {
    var args = Array.prototype.slice.call(arguments);

    for (var i = 0, l = args.length; i < l; i++) {
        notify.onError({
            title: 'Compile Error',
            message: args[i].message,
            sound: 'Beep'
        }).apply(this, args);
    }

    this.emit('end');
};
