function initEditor() {
    tinymce.remove();
    tinymce.init({
        selector: '.editor',
        plugins: 'link image code autoresize table lists',
        toolbar: 'blocks | code | undo redo | link image | fontsize forecolor backcolor bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | removeformat | table',
        min_height: 300,
        max_height: 400,
        placeholder: 'Nhập nội dung bài viết',
        resize: true,
        valid_elements: '*[*]',
        extended_valid_elements: 'p[style],img[src|alt|title|style|class]',
        valid_styles: {
            '*': 'color,font-size,font-weight,text-decoration,text-align,background-color,margin,display'
        },
        fontsize_formats: '10px 12px 14px 16px 18px 20px 24px 28px 32px 36px 48px',
        custom_elements: 'i',
        forced_root_block: 'p',
        autoresize_bottom_margin: 100,
        menu: {
            file: { title: 'File', items: 'newdocument restoredraft | preview | print' },
            edit: { title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
            view: { title: 'View', items: 'code | visualaid visualchars visualblocks | preview fullscreen' },
            insert: { title: 'Insert', items: 'image link media inserttable hr' },
            format: { title: 'Format', items: 'blocks | bold italic underline strikethrough | forecolor backcolor | removeformat' },
            tools: { title: 'Tools', items: 'code wordcount' },
            table: { title: 'Table', items: 'inserttable | cell row column | tableprops deletetable' },
            help: { title: 'Help', items: 'help' }
        },
        image_class_list: [
            { title: 'Căn trái', value: 'float-start img-fluid' },
            { title: 'Căn giữa', value: 'd-block mx-auto img-fluid' },
            { title: 'Căn phải', value: 'float-end img-fluid' }
        ],
        content_css: ['/assets/home/vendor/bootstrap.min.css'],
        block_formats: 'Đoạn văn=p; Tiêu đề 1=h1; Tiêu đề 2=h2; Tiêu đề 3=h3; Tiêu đề 4=h4; Tiêu đề 5=h5; Tiêu đề 6=h6',
        automatic_uploads: true,
        document_base_url: '/',
        relative_urls: false,        // giữ nguyên dấu / ở đầu
        remove_script_host: true,    // KHÔNG thêm domain
        images_file_types: 'jpeg,jpg,jpe,jfi,jif,jfif,png,gif,bmp,webp',
        images_upload_url: '/api/upload',
    });
}
