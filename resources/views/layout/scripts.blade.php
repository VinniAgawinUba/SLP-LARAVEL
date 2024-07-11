<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/simple-datatables.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/jquery.dataTables.js')}}"></script> <!-- Move this line up -->
<link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.css')}}" /> <!-- Move this line up -->
<style>
    body {
    font-family: "Your Font", sans-serif; /* Replace "Your Font" with the font you want to use */
}
</style>


{{--Sidebar Toggle Animation--}}
<script src="{{asset('assets/js/scripts.js')}}"></script>

        <script>
            $(document).ready( function () {
            $('#myCategory').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myCollege').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myProject').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myDepartment').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myFaculty').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myPartner').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myPost').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myUsers').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myInventory').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myRequests').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myProject').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#mySchoolyear').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myStudent').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myPurchaseRequests').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myItemHistory').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myRequestDetailsHistory').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#myPurchaseRequestsFront').DataTable({
                "order": [[ 0, "desc" ]]
            });

            

            } );
        </script>



<!-- CSS For Select2 -->
<link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" />

<!-- JavaScript for Select2 -->
<script src="{{asset('assets/js/select2.min.js')}}"></script>
<script>
    // Initialize Select2 for dropdowns
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

<!-- JavaScript for General Button Confirmation (Buttons Should have class of ConfirmButton) -->
<script>
    // Select all elements with the class 'ConfirmButton'
    var ConfirmButton = document.querySelectorAll(".ConfirmButton");
    
    // Iterate over each delete button and attach event listener
    ConfirmButton.forEach(function(button) {
        button.addEventListener("click", function(event) {
            if (confirm("Confirm to Continue")) {
                // Find the closest form and submit it
                this.closest(".deleteForm").submit();
            } else {
                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>

<!-- JavaScript for Delete Button Confirmation (Buttons Should have class of deleteButton) -->
<script>
    // Select all elements with the class 'deleteButton'
    var deleteButtons = document.querySelectorAll(".deleteButton");
    
    // Iterate over each delete button and attach event listener
    deleteButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            if (confirm("Are you sure you want to delete this document?")) {
                // Find the closest form and submit it
                this.closest(".deleteForm").submit();
            } else {
                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>












</body>
</html>
