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
                    url: "/control/deletePerformance.php",
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
);

// Edit funtion
$(".edit").click(
function()
{
    let title = $(this).parent().prev().prev().prev().prev().prev().prev().text();
    let description = $(this).parent().prev().prev().prev().prev().prev().text();
    let starttime = $(this).parent().prev().prev().prev().prev().text();
    let date = $(this).parent().prev().prev().prev().text();
    let dateint = date.substring(6, 10) + '-' + date.substring(3, 5) + '-' + date.substring(0, 2)
    let alocation = $(this).parent().prev().prev().text();
    let seats = $(this).parent().prev().text();

    Swal.fire({
        title: "Pas de vertoning aan",
        confirmButtonColor: '#47DD55',
        cancelButtonColor: '#d33',
        showCancelButton: true,
        html:
            "<form class='form'>" +
            "<input value='" + title + "' placeholder='Titel' type='text' id='titel'><br>" +
            "<textarea placeholder='Beschrijving' id='beschrijving'>" + description + "</textarea><br>" +
            "<input value='" + starttime + "' type='time' id='begintijd'>" +
            "<input value='" + dateint + "' type='date' id='datum'><br>" +
            "<input value='" + alocation + "' placeholder='Locatie' type='text' id='locatie'><br>" +
            "<input value='" + seats + "' placeholder='Zitplaatsen' type='number' id='zitplaatsen'>" +
            "</form>",
    }).then(() =>
    {
        if (result.isConfirmed)
        {
            $.ajax({
                url: "/control/editPerformance.php",
                type: "POST",
                data:
                    {
                        id: this.id,
                        title: $("#titel").val(),
                        description: $("#beschrijving").val(),
                        time: $("#begintijd").val(),
                        date: $("#datum").val(),
                        location: $("#locatie").val(),
                        max: $("#zitplaatsen").val()
                    },
                success: function (response) {
                    if (response == 0)
                    {
                        Swal.fire({
                            confirmButtonColor: '#3085d6',
                            title: 'Vertoning is aangepast',
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
);

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
