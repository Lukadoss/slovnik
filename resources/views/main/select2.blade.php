@include('layout.header')
<main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--white" style="width: 500px; margin: auto;">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <link href="css/select2.min.css" rel="stylesheet"/>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
            <script src="js/cs.js" type="text/javascript"></script>

            <script type="text/javascript">
                $(document).ready(function () {
                    $(".ayy").select2({
                        placeholder: 'Select an option',
                        theme: 'default',
                        language: "cs",
                        minimumInputLength: 2
                    });
                });
            </script>
            <select class="ayy" style="width: 100%;">
                @foreach($districts as $district)
                    <option><?php echo $district->municipality . ", " . $district->region;?></option>
                @endforeach
            </select>
        </div>
    </div>
</main>
@include('layout.footer')
