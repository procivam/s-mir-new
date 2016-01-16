<div class="auLogin"><input type="text" id="login" class="loginFormEl formIconLogin" autocomplete="off" autofocus placeholder="Логин"></div>
<div class="auPass"><input type="password" id="password"  class="loginFormEl formIconPass" autocomplete="off" placeholder="Пароль"></div>
<div class="error"></div>
<div class="auRe">
    <label>
        <input type="checkbox" id="remember">
        <span class="auReLabel">Запомнить меня</span>
    </label>
</div>

<div class="btnWrap clearFix">
    <!-- <a href="#" class="passLink">Забыли пароль?</a> -->
    <a href="#" class="enterLink" id="enterLink">Войти</a>
</div>

<script>
    var ref = '<?php echo \Core\Arr::get($_GET, 'ref') ? \Core\Encrypt::instance()->decode($_GET['ref']) : NULL; ?>';
    $(function(){
        $('.auWrap').on('keydown', function(event) {
            if(event.keyCode === 13) {
                $('#enterLink').trigger('click');
            }
        });
        $('#enterLink').on('click', function(e){
            e.preventDefault();
            var login = $('#login').val();
            var password = $('#password').val();
            var remember = 0;
            if( $('#remember').prop('checked') ) {
                remember = 1;
            }
            $.ajax({
                url: '/wezom/ajax/login',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    login: login,
                    password: password,
                    remember: remember
                },
                success: function(data){
                    if( data.success ) {
                        if(ref) {
                            window.location.href = ref;
                        } else {
                            window.location.reload();
                        }
                    } else {
                        $('.error').html(data.msg);
                    }
                }
            });
        });
    });
</script>

<style>
    .error {
        margin-top: -17px;
        color: red;
        font-size: 12px;
        height: 16px;
    }
</style>