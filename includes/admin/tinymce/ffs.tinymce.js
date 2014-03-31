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
                     ed.selection.setContent('[tabs id="ffs-tabbed-0" type="default, vertical, accordion" width="100%, auto" fit="true, false"] <br /> [tab title="Title 1"] Tab 1 content place [/tab] <br /> [tab title="Title 2"] Tab 2 content place [/tab] <br /> [tab title="Title 3"] Tab 3 content place [/tab] <br /> [/tabs]');  
											 
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
    tinymce.create('tinymce.plugins.ffs_description_box', {  
        init : function(ed, url) {  
            ed.addButton('ffs_description_box', {  
                title : 'Add Description Box',  
                image : url+'/retinaicon.png',  
                onclick : function() {  
                     ed.selection.setContent('[description_box id="desc-box-0" style=" all css style "] Hello, world! This is Fruitful Shortcodes plugin. [/description_box]');  
											 
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ffs_description_box', tinymce.plugins.ffs_description_box);  
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
                     ed.selection.setContent('[info_box_row id="row-0"] <br /> [info_box column="ffs-two-one" title="Title 1" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/info_box] <br /> [info_box column="ffs-two-one" title="Title 2" link="" styletitle="" styletext="" styleicon="" image="" icon="" last="true"]Lorem ipsum dolor sit amet.[/info_box] <br /> [/info_box_row]');  
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
                     ed.selection.setContent('[info_box_row id="row-1"] <br /> [info_box column="ffs-three-one" title="Title 1" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/info_box] <br /> [info_box column="ffs-three-one" title="Title 2" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/info_box] <br /> [info_box column="ffs-three-one" title="Title 3" link="" styletitle="" styletext="" styleicon="" image="" icon="" last="true"]Lorem ipsum dolor sit amet.[/info_box] <br /> [/info_box_row]');  
											 
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
                     ed.selection.setContent('[info_box_row id="row-2"] <br /> [info_box column="ffs-three-two" title="Title 1" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/info_box] <br /> [info_box column="ffs-three-one" title="Title 2" link="" styletitle="" styletext="" styleicon="" image="" icon="" last="true"]Lorem ipsum dolor sit amet.[/info_box] <br /> [/info_box_row]');  
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
                     ed.selection.setContent('[info_box_row id="row-3"] <br /> [info_box column="ffs-four-one" title="Title 1" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/info_box] <br /> [info_box column="ffs-four-one" title="Title 2" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/info_box] <br /> [info_box column="ffs-four-one" title="Title 3" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/info_box] <br /> [info_box column="ffs-four-one" title="Title 4" link="" styletitle="" styletext="" styleicon="" image="" icon="" last="true"]Lorem ipsum dolor sit amet.[/info_box] <br /> [/info_box_row]');  
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
                     ed.selection.setContent('[info_box_row id="row-3"] <br /> [info_box column="ffs-four-three" title="Title 1" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/info_box] <br /> [info_box column="ffs-four-one" title="Title 2" link="" styletitle="" styletext="" styleicon="" image="" icon="" last="true"]Lorem ipsum dolor sit amet.[/info_box] <br /> [/info_box_row]');  
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
                     ed.selection.setContent('[info_box_row id="row-3"] <br /> [info_box column="ffs-five-one" title="Title 1" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/info_box] <br /> [info_box column="ffs-five-one" title="Title 2" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/info_box] <br /> [info_box column="ffs-five-one" title="Title 3" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/info_box] <br /> [info_box column="ffs-five-one" title="Title 4" link="" styletitle="" styletext="" styleicon="" image="" icon=""]Lorem ipsum dolor sit amet.[/info_box] <br /> [info_box column="ffs-five-one" title="Title 5" link="" styletitle="" styletext="" styleicon="" image="" icon="" last="true"]Lorem ipsum dolor sit amet.[/info_box] <br /> [/info_box_row]');  
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
                image : url+'/gap.png',  
                onclick : function() {  
                     ed.selection.setContent('[sep id="sep-0" height="10" style="border-bottom:1px solid #ebebeb;"]');  
											 
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ffs_sep', tinymce.plugins.ffs_sep);  
})();

