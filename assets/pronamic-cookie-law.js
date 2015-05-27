var Pronamic_Cookies = {
    blocker: {
        config: {},
        ready: function() {
            Pronamic_Cookies.blocker.config.dom = {
                'reload': jQuery('.jBlockerAcceptReload'),
                'ext': jQuery('.jBlockerAcceptExt')
            };

            Pronamic_Cookies.blocker.binds();
        },
        binds: function() {
            Pronamic_Cookies.blocker.config.dom.reload.click(Pronamic_Cookies.blocker.set_and_reload);
            Pronamic_Cookies.blocker.config.dom.ext.click(Pronamic_Cookies.blocker.set_and_go_elsewhere);
        },
        set_and_reload: function(e) {
            e.preventDefault();

            Pronamic_Cookies.cookie.make({
                'name': 'cookie_notice_accepted',
                'value': true
            });
            document.location.reload(true);
        },
        set_and_go_elsewhere: function(e) {
            e.preventDefault();

            Pronamic_Cookies.cookie.make({
                'name': 'cookie_notice_accepted',
                'value': true
            });
            document.location = $(this).attr('href');
        }
    },
    cookie: {
        all:{},
        make: function( args ) {
            document.cookie = escape( args.name ) + '=' + escape( args.value ) + "; path=" + Pronamic_Cookies_Vars.cookie.path + ';expires=' + Pronamic_Cookies_Vars.cookie.expires;
        }

    }
};

jQuery(Pronamic_Cookies.ready);