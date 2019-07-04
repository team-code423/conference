$(function () {

    $(".avatar").click(function () {
        $(".admin-menu").slideToggle(400);
    });
    

    $("#addconf").click(function (e) {

        e.preventDefault();

       
     

        var title = $("#title").val();
        var location = $("#location").val();
        var year = $("#year").val();
        var abstract = $("#abstract").val();
        var status = $("#status").val();

        var formData = new FormData();
        var imgs = document.getElementById('imgs').files.length;
        for (var x = 0; x < imgs; x++) {
            formData.append("files[]", document.getElementById('imgs').files[x]);
        }

        formData.append('title',title);
        formData.append('location',location);
        formData.append('year',year);
        formData.append('abstract',abstract);
        formData.append('status',status);
        

        $.ajax({
            url: './ajax/add_conf.php', 
            dataType: 'text', 
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'POST',
            success: function (data) {
                console.log(data);
                alert("Data Added Successfuly");
                $("#title").val("");
                $("#location").val("");
                $("#year").val("");
                $("#status").val("Not Active");
                $("#abstract").val("");
                $("#imgs").val("");
            },
            error: function (response) {
                alert(response);
                console.log(response);
            }
        });


    });

    $("#addauther").click(function (e) {

        e.preventDefault();

        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var aff = $("#afflliation").val();
        var qual = $("#qualification").val();
        var address = $("#address").val();
        var abstract = $("#abstract").val();



        $.ajax({

            url: './ajax/add_auther.php',
            type: "POST",
            dataType: "text",
            data: {
                fname: fname,
                lname: lname,
                email: email,
                aff: aff,
                qual: qual,
                address: address,
                abstract: abstract
            },
            success: function (data) {
                alert("Data Added Successfuly");
                $("#fname").val("");
                $("#lname").val("");
                $("#email").val("");
                $("#afflliation").val("");
                $("#qualification").val("");
                $("#address").val("");
                $("#abstract").val("");

            },
            error: function (error) {
                console.log(error);
            }

        });



    });
    
     $("#addschedule").click(function (e) {

        e.preventDefault();

       
        var formdata = $("form").serialize();
        

        $.ajax({

            url: './ajax/add_sched.php',
            type: "POST",
            dataType: "text",
            data: formdata,
            success: function (data) {
                alert("Data Added Successfuly");
                console.log(data);
                
               $("form").reset();

            },
            error: function (error) {
                console.log(error);
            }

        });



    });

    
    $("#addhotel").click(function (e) {

        e.preventDefault();

        var name = $("#name").val();
        var address = $("#address").val();


        $.ajax({

            url: './ajax/add_hotel.php',
            type: "POST",
            dataType: "text",
            data: {
                name: name,
                address: address
            },
            success: function (data) {
                alert("Data Added Successfuly");
                $("#name").val("");
                $("#address").val("");

            },
            error: function (error) {
                console.log(error);
            }

        });



    });


    $("#addpaper").click(function (e) {

        e.preventDefault();

        var title = $("#title").val();
        var link = $("#link").val();
        var abs = $("#abstract").val();
        var subm = $("#submission").val();
        var keys = $("#keywords").val();




        $.ajax({

            url: './ajax/add_paper.php',
            type: "POST",
            dataType: "text",
            data: {
                title: title,
                link: link,
                abstract: abs,
                submission: subm,
                keys: keys
            },
            success: function (data) {
                alert("Data Added Successfuly");
                console.log(data);

            },
            error: function (error) {
                console.log(error);
            }

        });



    });



    $("#sponsorform").submit(function (e) {

        e.preventDefault();

        var data = new FormData(this);
        $.each(jQuery('#file')[0].files, function (i, file) {
            data.append('file[]', file);
        });


        $.ajax({
            url: './ajax/add_sponsors.php',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST', // For jQuery < 1.9
            success: function (data) {
                console.log(data);
                alert("Data Added Successfuly");
                $("#name").val("");
                $("#file").val("");
                $("#email").val("");
            }
        });



    });

    $("#addtopic").click(function (e) {

        e.preventDefault();

        var title = $("#title").val();
        var keys = $("#keywords").val();


        $.ajax({

            url: './ajax/add_topics.php',
            type: "POST",
            dataType: "text",
            data: {
                title: title,
                keywords: keys
            },
            success: function (data) {
                alert("Data Added Successfuly");
                $("#title").val("");
                $("#keywords").val("");

            },
            error: function (error) {
                console.log(error);
            }

        });



    });


    $("#addreviewer").click(function (e) {

        e.preventDefault();

        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var aff = $("#afflliation").val();
        var qual = $("#qualification").val();
        var address = $("#address").val();
        var phone = $("#phone").val();



        $.ajax({

            url: './ajax/add_reviewer.php',
            type: "POST",
            dataType: "text",
            data: {
                fname: fname,
                lname: lname,
                email: email,
                aff: aff,
                qual: qual,
                address: address,
                phone: phone
            },
            success: function (data) {
                alert("Data Added Successfuly");
                $("#fname").val("");
                $("#lname").val("");
                $("#email").val("");
                $("#afflliation").val("");
                $("#qualification").val("");
                $("#address").val("");
                $("#phone").val("");

            },
            error: function (error) {
                console.log(error);
            }

        });



    });
    
      $("#addcom").click(function (e) {

        e.preventDefault();

        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var conf_id = $("#conf_id").val();
        



        $.ajax({

            url: './ajax/add_com.php',
            type: "POST",
            dataType: "text",
            data: {
                fname: fname,
                lname: lname,
                conf_id: conf_id
            },
            success: function (data) {
                alert(data);
                $("#fname").val("");
                $("#lname").val("");
                $("#conf_id").val("");
               

            },
            error: function (error) {
                console.log(error);
            }

        });



    });
    
    
    $("#addmemb").click(function (e) {

        e.preventDefault();

        var name = $("#name").val();
        var email = $("#email").val();
        var aff   = $("#afflliation").val();
        var intrs  = $("#interests").val();
        var address = $("#address").val();
        



        $.ajax({

            url: './ajax/add_member.php',
            type: "POST",
            dataType: "text",
            data: {
                name: name,
                email: email,
                aff: aff,
                intrs: intrs,
                address: address,
                
            },
            success: function (data) {
                alert(data);
                $("#fname").val("");
                aff.val("");
                $("#email").val("");
                intrs.val("");
                $("#address").val("");
              

            },
            error: function (error) {
                console.log(error);
            }

        });



    });
    
    
    
    
    
    $("#addcr").click(function (e) {

        e.preventDefault();

        var content = $("#content").val();
        var url = $("#url").val();


        $.ajax({

            url: './ajax/add_cmr.php',
            type: "POST",
            dataType: "text",
            data: {
                content: content,
                url: url
            },
            success: function (data) {
                alert("Data Added Successfuly");
                $("#content").val("");
                $("#url").val("");

            },
            error: function (error) {
                console.log(error);
            }

        });



    });




});
