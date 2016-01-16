<div class="form-group">
    <div class="">
        <label class="control-label" for="parent_id">
            Изображение, которое нужно обрезать
        </label>
        <div class="">
            <div class="controls">
                <?php foreach($images AS $key => $value): ?>
                    <a href="<?php echo \Core\General::crop($arr[0], $value['path'], $arr[1], $arr[2]); ?>" class="btn <?php echo $value['path'] == $arr[3] ? 'btn-primary' : NULL; ?>"><?php echo $value['width'].'x'.$value['height']; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="rowSection">
    <link rel="stylesheet" href="<?php echo Core\HTML::bmedia('css/cropper.css'); ?>">
    <script type="text/javascript" src="<?php echo Core\HTML::bmedia('js/cropper.js'); ?>"></script>
    <div class="col-md-12 editModule preloadCrop" id="editModule" data-config='<?php echo $json; ?>'>
        <div class="widget box">
            <div class="widgetHeader">
                <div class="widgetTitle">
                    <i class="fa-edit"></i> Редактирование изображения
                </div>
            </div>
            <div class="widgetContent">
                <div class="col-md-5 cropBlock">
                    <div class="cropBlockIn">
                        <img src="<?php echo $image; ?>" alt="Picture">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-info" id="croppedBtn">Кропнуть</div>
                </div>
                <div class="col-md-6 cropPreview" id="cropPreview"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var crop = $('#editModule');
    if (crop.length) {
        var data = crop.data('config');
        var ratio = parseInt(data.width, 10) / parseInt(data.height, 10);
        var preview = $('<div class="cropPreviewIn"><div class="cropPreviewImg"></div><div class="cropPreviewTxt">'+data.width+' x '+data.height+'</div></div>');
        preview.children('.cropPreviewImg').css({
            width: data.width,
            height: data.height
        });
        preview.appendTo($('#cropPreview'));
        initCrop(ratio);
    }

    function initCrop(ratio) {
        var wd = +($('.cropBlock').outerWidth()) / ratio;
        var wdP = +($('.cropBlock').parent().width());
        $('.cropBlock').css('padding-top', wd / wdP * 100 + '%');

        var $crop = $('.cropBlockIn > img'),
            options = {
                aspectRatio: ratio,
                preview: '.cropPreviewImg'
            };

        $crop.cropper(options).on('built.cropper', function(event) {
            setTimeout(function() {
                $('#editModule').removeClass('preloadCrop');
            }, 500);
        });

        $(document).keydown(function(event) {
            if (event.keyCode === 13) {
                $crop.cropper('reset', true);
            }
        });
        $('#croppedBtn').on('click', function(event) {
            preloader();
            event.preventDefault();
            var json = [
                '{"cropBox":' + JSON.stringify($crop.cropper('getData')),
                '"naturalImage":' + JSON.stringify($crop.cropper('getImageData')) + '}'
            ].join();
            $.ajax({
                type: 'POST',
                /*url:  url ,*/
                data: {
                    json: json
                },
                dataType: 'JSON',
                success: function(data) {
                    preloader();
                    if(data.success) {
                        generate('Фото обрезано!', 'success', 5000);
                    } else {
                        generate('Что-то пошло не так!', 'warning', 5000);
                    }
                },
                error: function(data) {
                    preloader();
                    generate('Что-то пошло не так!', 'warning', 5000);
                }
            });
        });
    }
</script>

<style>
    .cropPreviewIn, .cropPreviewImg, .cropPreviewImg img {
        max-width: 720px;
    }
</style>