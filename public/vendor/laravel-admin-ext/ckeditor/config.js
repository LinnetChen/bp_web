/**
 * @license Copyright (c) 2003-2023, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.removePlugins = "easyimage,cloudservices,exportpdf";
    config.allowedContent = true;

    config.filebrowserImageUploadUrl ="/ckeditor/upload?opener=ckeditor&type=images";
    config.filebrowserBrowseUrl = "/vendor/laravel-admin-ext/ckfinder/filePath.html";
    config.filebrowserImageBrowseUrl = "/vendor/laravel-admin-ext/ckfinder/filePath.html";

    // config.filebrowserImageUploadUrl ="/vendor/laravel-admin-ext/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";
    // config.filebrowserBrowseUrl ="/vendor/laravel-admin-ext/ckfinder/ckfinder.html?type=Files";
    // config.filebrowserImageBrowseUrl ="/vendor/laravel-admin-ext/ckfinder/ckfinder.html?type=Files";
    config.image_previewText = " ";
    config.filebrowserUploadMethod = "form";

};

