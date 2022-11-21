// Delete function
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
// Edit funtion
$(".edit").click(

)

function conformation() {
    Swal.fire({
        title: 'Weet je het zeker?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ja, ik weet het zeker!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Verwijderd!',
                'Input is verwijderd.',
                'success'
            )
        }
    })
}

function refresh()
{
    window.location = window.location.href;
}
// Zoek functie overzicht pagina
$(document).ready(function(){
    $("#searchTable").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".tableSearch tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});