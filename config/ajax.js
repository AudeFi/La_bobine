var $container          = $( 'form.search' ),
    $input_movie_title  = $container.find( 'input#movie_title' ),
    $input_movie_select = $container.find( 'input#movie_select' ),
    $input_movie_id     = $container.find( 'input#movie_id' ),
    $results            = $container.find( '.results' );

$input_movie_title.keyup(function() {

	var value = $.trim( $input_movie_title.val() );

    $.ajax({
        url     : "config/form-movie.php",
        type    : "POST",
        data    : { 'name':value },
        success : function(data, status, xhr) {

            data = JSON.parse(data);
            
            $results.empty();

            for( var i = 0; i < data.length; i++ )
            {
                var _data = data[i],
                    $a    = $( '<a>' );

                $a.data( 'id', _data.id );
                $a.attr( 'href', '#' );
                $a.text( _data.title );

                $a.on( 'click', function()
                {
                    var $a = $(this);

                    $input_movie_id.val( $a.data( 'id' ) );
                    $input_movie_select.val( $a.text( _data.title ) );

                    return false;
                } );

                $results.append( $a );
            }
        
        },
        error: function (jqXHR, status, errorThrown) {
            console.log ('error');
        }
    });
});