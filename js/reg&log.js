$(document).ready(function(){
            $('#log-table').hide();
            $('#reg-nav-log').click(function(){
                $('#reg-table').hide();
                $('#log-table').show();
            });
            $('#reg-nav-reg').click(function(){
                $('#log-table').hide();
                $('#reg-table').show();
            });


            $('#reg-btn').click(function() {
                var cont = $('#reg-table input').serialize();
                $.ajax({
                    url:"register-act.php",
                    type:'post',
                    dataType:'json',
                    data:cont,
                    success:function(data){
                        $('#rtishi').html(data);
                    }

                })
            })

            $('#log-btn').click(function(){
                var cont = $('#log-table input').serialize();
                $.ajax({
                    url:"log-act.php",
                    type:'post',
                    datatype:'json',
                    data:cont,
                    success:function(data){
                        if(data==1){
                            $(location).attr('href', 'personal/photo.html');
                        }else{
                            var str='用户名或密码错误';
                            $('#ltishi').html(str);
                        }
                    }
                })
            })



        });