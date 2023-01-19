// Delete function
$(".delete").click
(
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
$(".edit").click
(
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
                "<input value='" + title + "' placeholder='Titel' type='text' id='titel' class='form-control'><br>" +
                "<textarea placeholder='Beschrijving' id='beschrijving' class='form-control'>" + description + "</textarea><br>" +
                "<input value='" + starttime + "' type='time' id='begintijd' class='form-control'><br>" +
                "<input value='" + dateint + "' type='date' id='datum' class='form-control'><br>" +
                "<input value='" + alocation + "' placeholder='Locatie' type='text' id='locatie' class='form-control'><br>" +
                "<input value='" + seats + "' placeholder='Zitplaatsen' type='number' id='zitplaatsen' class='form-control'>" +
                "</form>",
        }).then((result) =>
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

$(".add").click
(
    function ()
    {
        Swal.fire({
            title: "Maak een voorstelling aan",
            confirmButtonColor: '#47DD55',
            cancelButtonColor: '#d33',
            showCancelButton: true,
            html:
                "<form class='form'>" +
                "<input placeholder='Titel' type='text' id='titel' class='form-control'><br>" +
                "<textarea placeholder='Beschrijving' id='beschrijving' class='form-control'></textarea><br>" +
                "<input type='time' id='begintijd' class='form-control'><br>" +
                "<input type='date' id='datum' class='form-control'><br>" +
                "<input placeholder='Locatie' type='text' id='locatie' class='form-control'><br>" +
                "<input placeholder='Zitplaatsen' type='number' id='zitplaatsen' class='form-control'>" +
                "</form>",
        }).then((result) =>
        {
            if (result.isConfirmed)
            {
                $.ajax({
                    url: "/control/addPerformance.php",
                    type: "POST",
                    data:
                        {
                            showID: this.id,
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
                                title: 'Voorstelling is aangemaakt',
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

$(".reservation").click
(
    function ()
    {
        Swal.fire({
            title: "Reserveren",
            confirmButtonColor: '#47DD55',
            cancelButtonColor: '#d33',
            showCancelButton: true,
            html:
                "<form class='form'>" +
                "<input placeholder='Naam' type='text' id='name' class='form-control'><br>" +
                "<input placeholder='E-mail' type='text' id='email' class='form-control'><br>" +
                "<input placeholder='Aantal bezoekers' type='number' id='amount' class='form-control'><br>" +
                "<input placeholder='Afdeling' type='text' id='sector' class='form-control'><br>" +
                "<select id='referral' class='form-control'>" +
                "<option value='0' selected disabled>Hoe weet je van de voorstelling?</option>" +
                "<option value='Portaal'>Startpunt portaal</option>" +
                "<option value='Beeldschermen'>Promotie op beeldschermen</option>" +
                "<option>Andere</option>" +
                "</select><br>" +
                "</form>",
        }).then((result) =>
        {
            if (result.isConfirmed)
            {
                $.ajax({
                    url: "/control/addReservation.php",
                    type: "POST",
                    data:
                        {
                            showID: this.id,
                            name: $("#name").val(),
                            email: $("#email").val(),
                            amount: $("#amount").val(),
                            sector: $("#sector").val(),
                            referral: $("#referral").val(),
                        },
                    success: function (response) {

                        //NOT FUNCTIONING

                        /*if (response == 0)
                        {
                            Swal.fire({
                                confirmButtonColor: '#3085d6',
                                title: 'Voorstelling is aangemaakt',
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
                        }*/
                        console.warn(response);
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

// Zoek functie overzicht pagina
$(document).ready(function(){
    $("#searchTable").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".tableSearch tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
