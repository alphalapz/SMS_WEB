var abc = 0;
//function increment() {
    
//};
$(document).ready(function() {
    $('#add_more').click(function() {//for Add More Files button Clicked these function Will be Called (new file field is added dynamically)
        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                $("<input/>", {name: 'file[]', type: 'file', id: 'file', accept:'image/*'}),        
                $("<br/><br/>")
                ));
    });

$('body').on('change', '#file', function(){
            if (this.files && this.files[0]) {
				$('#add_more').before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
					$("<input/>", {name: 'file[]', type: 'file', id: 'file', accept:'image/*'}),        
					$("<br/><br/>")
				));
                //increment();
                abc += 1;
                var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img class='deleteClass' id='previewimg" + abc + "' src=''/></div>");
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
                $(this).hide();
				document.getElementById("add_more").disabled = false;
                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: 'images/x.png', alt: 'X'}).click(function() {
					var r = confirm("¿Seguro que deseas eliminar la imagen?" );
					if (r == true) {
						$(this).parent().parent().fadeOut(500,function(){
						$(this).remove();
					});
					}
                }));
            }
        });
        
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name)
        {
            alert("Se debe subir al menos una imagen!.");
            e.preventDefault();
        }
    });
});