/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;image:Upload;link:advanced;link:target;link:upload';
	//config.removeContents='Upload';
	//config.removeContents=('upload');
	//config.extraPlugins = 'uploadimage';
	//config.uploadUrl = '/uploader/upload.php';
	config.extraPlugins = 'youtube';
	//config.extraPlugins = 'filebrowser';


	config.filebrowserBrowseUrl = '../../js/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = '../../js/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = '../../js/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = '../../js/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = '../../js/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = '../../js/kcfinder/upload.php?opener=ckeditor&type=flash';

	//config.removeDialogTabs = 'image:advanced;image:upload;link:advanced;link:target;link:upload';

	//config.filebrowserBrowseUrl = '../../js/ckfinder/ckfinder.html';
	//config.filebrowserImageBrowseUrl = '../../js/ckfinder/ckfinder.html?type=Images';
	//config.filebrowserFlashBrowseUrl = '../../js/ckfinder/ckfinder.html?type=Flash';
	//config.filebrowserUploadUrl = '../../js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	//config.filebrowserImageUploadUrl = '../../js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	//config.filebrowserFlashUploadUrl = '../../js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';



};
