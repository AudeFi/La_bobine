var $container          = $( 'form.search' ),
    $input_movie_title  = $container.find( 'input#movie_title' ),
    $input_movie_name = $container.find( 'input#movie_name' ),
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
                $a.addClass('list');

                $a.data( 'id', _data.id );
                $a.attr( 'href', '#' );
                $a.text( _data.title );

                $a.on( 'click', function()
                {
                    var $a = $(this);

                    $input_movie_id.val( $a.data( 'id' ) );
                    $input_movie_name.val( $a.text() );

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