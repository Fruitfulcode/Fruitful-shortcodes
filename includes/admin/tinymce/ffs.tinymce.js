/*-----------------------------------------------------------------------------------*/
/*	ffs TinyMCE "Tabs" Button
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.ffs_tabs', {  
        init : function(ed, url) {  
            ed.addButton('ffs_tabs', {  
                title : 'Add Tabs',  
                image : url+'/tabs.png',  
                onclick : function() {  
                     ed.selection.setContent('[ffs_tabs type="default, vertical, accordion" width="100%, auto" fit="true, false"] <br /> [ffs_tab title="Title 1"] Tab 1 content place [/ffs_tab] <br /> [ffs_tab title="Title 2"] Tab 2 content place [/ffs_tab] <br /> [ffs_tab title="Title 3"] Tab 3 content place [/ffs_tab] <br /> [/ffs_tabs]');  
											 
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ffs_tabs', tinymce.plugins.ffs_tabs);  
})();

/*-----------------------------------------------------------------------------------*/
/*	ffs TinyMCE "Description Box" Button
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.ffs_dbox', {  
        init : function(ed, url) {  
            ed.addButton('ffs_dbox', {  
                title : 'Add promo text',  
                image : url+'/promotext.png',  
                onclick : function() {  
                     ed.selection.setContent('[ffs_dbox style=" all css style "] Hello, world! This is Fruitful Shortcodes plugin. [/ffs_dbox]');  
											 
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ffs_dbox', tinymce.plugins.ffs_dbox);  
})();


/*-----------------------------------------------------------------------------------*/
/*	ffs TinyMCE "Info Box Area with columns" Button
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.ffs_one_half_column', {  
        init : function(ed, url) {  
            ed.addButton('ffs_one_half_column', {  
                title : 'Add 1/2 Columns',  
                image : url+'/one_half.png',  
                onclick : function() {  
                     ed.selection.setContent('[ffs_ibox_row] <br /> [ffs_ibox column="ffs-two-one" title="Title 1" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [ffs_ibox column="ffs-two-one" title="Title 2" link="" styletitle="" styletext="" styleicon="" image="" icon="" last="true"]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [/ffs_ibox_row]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ffs_one_half_column', tinymce.plugins.ffs_one_half_column);  
	
	tinymce.create('tinymce.plugins.ffs_one_third_column', {  
        init : function(ed, url) {  
            ed.addButton('ffs_one_third_column', {  
                title : 'Add 1/3 Columns',  
                image : url+'/one_third.png',  
                onclick : function() {  
                     ed.selection.setContent('[ffs_ibox_row] <br /> [ffs_ibox column="ffs-three-one" title="Title 1" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [ffs_ibox column="ffs-three-one" title="Title 2" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [ffs_ibox column="ffs-three-one" title="Title 3" link="" styletitle="" styletext="" styleicon="" image="" icon="" last="true"]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [/ffs_ibox_row][ffs_ibox_row] <br /> [ffs_ibox column="ffs-three-one" title="Title 1" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [ffs_ibox column="ffs-three-one" title="Title 2" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [ffs_ibox column="ffs-three-one" title="Title 3" link="" styletitle="" styletext="" styleicon="" image="" icon="" last="true"]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [/ffs_ibox_row]');  
											 
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ffs_one_third_column', tinymce.plugins.ffs_one_third_column);  
	
	tinymce.create('tinymce.plugins.ffs_two_third_column', {  
        init : function(ed, url) {  
            ed.addButton('ffs_two_third_column', {  
                title : 'Add 2/3 Columns',  
                image : url+'/two_third.png',  
                onclick : function() {  
                     ed.selection.setContent('[ffs_ibox_row] <br /> [ffs_ibox column="ffs-three-two" title="Title 1" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [ffs_ibox column="ffs-three-one" title="Title 2" link="" styletitle="" styletext="" styleicon="" image="" icon="" last="true"]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [/ffs_ibox_row]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ffs_two_third_column', tinymce.plugins.ffs_two_third_column);  
	
	tinymce.create('tinymce.plugins.ffs_one_fourth_column', {  
        init : function(ed, url) {  
            ed.addButton('ffs_one_fourth_column', {  
                title : 'Add 1/4 Columns',  
                image : url+'/one_fourth.png',  
                onclick : function() {  
                     ed.selection.setContent('[ffs_ibox_row] <br /> [ffs_ibox column="ffs-four-one" title="Title 1" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [ffs_ibox column="ffs-four-one" title="Title 2" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [ffs_ibox column="ffs-four-one" title="Title 3" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [ffs_ibox column="ffs-four-one" title="Title 4" link="" styletitle="" styletext="" styleicon="" image="" icon="" last="true"]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [/ffs_ibox_row]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ffs_one_fourth_column', tinymce.plugins.ffs_one_fourth_column);  
	
	tinymce.create('tinymce.plugins.ffs_three_fourth_column', {  
        init : function(ed, url) {  
            ed.addButton('ffs_three_fourth_column', {  
                title : 'Add 3/4 Columns',  
                image : url+'/three_fourth.png',  
                onclick : function() {  
                     ed.selection.setContent('[ffs_ibox_row] <br /> [ffs_ibox column="ffs-four-three" title="Title 1" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [ffs_ibox column="ffs-four-one" title="Title 2" link="" styletitle="" styletext="" styleicon="" image="" icon="" last="true"]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [/ffs_ibox_row]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ffs_three_fourth_column', tinymce.plugins.ffs_three_fourth_column);  
	
	tinymce.create('tinymce.plugins.ffs_one_fifth_column', {  
        init : function(ed, url) {  
            ed.addButton('ffs_one_fifth_column', {  
                title : 'Add 1/5 Columns',  
                image : url+'/one_fifth.png',  
                onclick : function() {  
                     ed.selection.setContent('[ffs_ibox_row] <br /> [ffs_ibox column="ffs-five-one" title="Title 1" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [ffs_ibox column="ffs-five-one" title="Title 2" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [ffs_ibox column="ffs-five-one" title="Title 3" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [ffs_ibox column="ffs-five-one" title="Title 4" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [ffs_ibox column="ffs-five-one" title="Title 5" link="" styletitle="" styletext="" styleicon="" image="" icon="" last="true"]Lorem ipsum dolor sit amet.[/ffs_ibox] <br /> [/ffs_ibox_row]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ffs_one_fifth_column', tinymce.plugins.ffs_one_fifth_column);  
})();

/*-----------------------------------------------------------------------------------*/
/*	ffs TinyMCE "Separator" Button
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ffs_sep', {  
        init : function(ed, url) {  
            ed.addButton('ffs_sep', {  
                title : 'Add Separator',  
                image : url+'/separator.png',  
                onclick : function() {  
                     ed.selection.setContent('[ffs_sep height="10" style="border-bottom:1px solid #ebebeb;"]');  
											 
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ffs_sep', tinymce.plugins.ffs_sep);  
})();


/*-----------------------------------------------------------------------------------*/
/*	ffs TinyMCE "Alerts" Button
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ffs_alerts', {  
        init : function(ed, url) {  
            ed.addButton('ffs_alerts', {  
                title : 'Add Alert',  
                image : url+'/alert.png',  
                onclick : function() {  
                     ed.selection.setContent('[ffs_alert type="alert-block, alert-error, alert-success, alert-info"]Oh snap! Change a few things up and try submitting again.[/ffs_alert]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ffs_alerts', tinymce.plugins.ffs_alerts);  
})();


/*-----------------------------------------------------------------------------------*/
/*	ffs TinyMCE "Progress bar" Button
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ffs_pbar', {  
        init : function(ed, url) {  
            ed.addButton('ffs_pbar', {  
                title :  'Add Progress Bar',  
                image : url+'/progressbar.png',  
                onclick : function() {  
                     ed.selection.setContent('[ffs_pbar][ffs_bar type="bar-success" width="60%"][/ffs_bar][/ffs_pbar]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ffs_pbar', tinymce.plugins.ffs_pbar);  
})();


/*-----------------------------------------------------------------------------------*/
/*	ffs TinyMCE "Bootstrap Button" Button
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.ffs_btn', {  
        init : function(ed, url) {  
            ed.addButton('ffs_btn', {  
                title :  'Add Button',  
                image : url+'/button.png',  
                onclick : function() {  
                     ed.selection.setContent('[ffs_btn]Name "button"[/ffs_btn]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ffs_btn', tinymce.plugins.ffs_btn);  
})();