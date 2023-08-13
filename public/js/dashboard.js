function logout() {
    axios.get('/logout')
        .then(
            (response) => {
                console.log(response)
            }
        )
        .catch(function (error) {
            console.log(error)
        })
}

function isEmpty() {
    let evt = document.getElementById("fetch-data");
    var regex = /^[A-Za-z0-9_]{1,20}$/;
    if (!regex.test(evt.value)) {
        evt.returnValue = false;
        evt.setCustomValidity("Please insert some value");
        evt.reportValidity();
        if (evt.preventDefault) evt.preventDefault();
        return false;
    } else {
        evt.setCustomValidity("");
        return true;
    }
};

// Form Submission

function formdispatch() {

    setTimeout(document.getElementsByTagName("form")[0].submit(), 10000);
}

// Table JS START
//exporte les données sélectionnées
var $table = $('#table');
$(function () {
    $('#toolbar').find('select').change(function () {
        $table.bootstrapTable('refreshOptions', {
            exportDataType: $(this).val(),
            exportOptions: {
                ignoreColumn: ["actions", "state"]
            }
        });
    });
    $('#toolbar-2').find('select').change(function () {
        console.log($(this).val());
        let sort = $table.bootstrapTable('getSelections').filter(function (val) {
            return val.state === true;
        });
        let idList = [];
        sort.map((val) => idList.push(val._id))
        axios.post('/updateStatus/', {
            ids: idList,
            status: $(this).val()
        })
            .then(
                (response) => {
                    if (response.data) {
                        console.log(response);
                        location.reload();
                    }
                }
            )
            .catch(function (error) {
                console.log(error);
            })
        $table.bootstrapTable('uncheckAll');
    });
    $('#fetchData').click(function () {
        searchKey = document.getElementById("keyName").value;
        searchValue = document.getElementById("fetch-data").value;
        if (searchValue.length > 3) {
            document.getElementsByTagName("form")[0].action = `/dashboard?${searchKey}=${searchValue}`;
            formdispatch();
        }
        else {
            isEmpty()
        }

    })

    // $(function() {
    //     $button.click(function () {
    //       alert('getSelections: ' + JSON.stringify($table.bootstrapTable('getSelections')))
    //     })
    //   })
});

var trBoldBlue = $("table");


$(trBoldBlue).on("click", "tr", function () {
    $(this).toggleClass("bold-blue");
});


// setTimeout(
//     $(".custom-buttons").each(function () {
//         let viewProfileBtn = document.createElement("a");
//         let viewProfileTxt = document.createTextNode("View Full Profile");
//         viewProfileBtn.appendChild(viewProfileTxt);
//         viewProfileBtn.setAttribute("class", "btn btn-primary");
//         this.appendChild(viewProfileBtn);
//     }),3000)
// Table JS END

