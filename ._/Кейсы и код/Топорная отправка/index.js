window.addEventListener( 'load', () => {
    let form = document.querySelector( '.js-form' );
    if( form ) {
        form.addEventListener( 'submit', ( Event ) => {
            Event.preventDefault();

            let Fields = new FormData( form );

            fetch( '/sendMail.php', {
                method: 'POST',
                body: Fields
            })
                .then(( Response  ) => {
                    if( !Response.ok ) throw new Error(`Server error`);
                    return Response.json();
                })
                .then(( data ) => {
                    if( !data.status ) throw new Error(`Send failed`);

                    PopupManager.open('popup_for_confirmation');
                    form.reset();
                })
                .catch((error) => {
                    alert( error.message );
                });


        });
    }
})