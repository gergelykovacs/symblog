;(function(name) {
    var me = this;

    function __init() {
        if(typeof window[name] == "undefined") {
            window[name] = me;
        }
    }

    this.respond = function() {
        var msg = 'Hello SymBlog!';
        console.log(msg);
        alert(msg);
    };

    __init();
})('SymBlogTest');
