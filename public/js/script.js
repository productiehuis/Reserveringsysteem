$(".delete").click(
    function () {
        Swal.fire({
            title: "Weet je het zeker?",
            text: "Deze actie kan niet worden teruggedraaid.",
            showCancelButton: true,
            confirmButtonColor: '#47DD55',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ja',
            cancelButtonText: 'Annuleren',
        }).then((result) => {
            if (result.isConfirmed) {
                let showID = this.id;

                $.ajax({
                    url: "/reserveringsysteem/public/control/deletePerformance.php",
                    method: "POST",
                    data: {id: showID},
                    success: function (response)
                    {
                        if (response == 0)
                        {
                            Swal.fire({
                                confirmButtonColor: '#3085d6',
                                title: 'Vertoning is verwijderd',
                                confirmButtonText: 'Sluiten',
                                icon: 'success',
                                willClose: refresh,
                            });
                        }
                        else
                        {
                            Swal.fire(
                                {
                                    title: 'Er is iets fout gegaan'
                                }
                            )
                        }
                    }
                })
            }
        })
    }
)

function refresh()
{
    window.location = window.location.href;
}
