<style>

    .wrapper > ul#results li {

        margin-bottom: 2px;

        background: #e2e2e2;

        padding: 20px;

        width: 97%;

        list-style: none;

    }

    .ajax-loading{

        text-align: center;

    }

</style>

<div class="wrapper">

    <ul id="results"><!-- results appear here --></ul>

    <div class="ajax-loading"><img src="{{ asset('images/loading.gif') }}" /></div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script>

    var page = 1; //track user scroll as page number, right now page number is 1

    load_more(page); //initial content load

    $(window).scroll(function() { //detect page scroll

        if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page

            page++; //page number increment

            load_more(page); //load content

        }

    });

    function load_more(page){

        $.ajax({

            url: '?page=' + page,

            type: "get",

            datatype: "html",

            beforeSend: function()

            {

                $('.ajax-loading').show();

            }

        })

            .done(function(data)

            {

                if(data.length == 0){

                    console.log(data.length);

                    //notify user if nothing to load

                    $('.ajax-loading').html("No more records!");

                    return;

                }

                $('.ajax-loading').hide(); //hide loading animation once data is received

                $("#results").append(data); //append data into #results element

                console.log('data.length');

            })

            .fail(function(jqXHR, ajaxOptions, thrownError)

            {

                alert('No response from server');

            });

    }

</script>
