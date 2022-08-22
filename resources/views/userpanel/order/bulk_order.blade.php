@extends('userpanel.layout.layout')

@section('content')
    <section>
        <section id="balance" class="balance pt-3">

            <!-- Yuxarı hisse -->
            <div class="container rounded bg-white py-3 mb-5 shadowBox">
                <div class="border rounded row m-2 px-3 py-4">
                    <span class="col-12 bulkOrderText mb-4">Save the excel file that you will send in bulk from
                        the
                        Save As menu with the extension
                        <a href="#" class="bulkOrderTextLink">.csv</a> and the column
                        separator comma.</span>

                    <span class="col-12 bulkOrderText mb-4">
                        The size of the file you create must be less than 100 Kb. Do
                        not use special characters in any of the fields</span>
                    <span class="col-12 bulkOrderText mb-4">You can download the sample
                        <a href="#" class="bulkOrderTextLink">CSV</a> file from the
                        link below.</span>
                    <div class="col-12 my-4">
                        <button class="btn-file1">
                            Download sample file <input type="file" />
                        </button>
                    </div>
                </div>
            </div>
            <!-- En Yuxari hisse -->
            <!-- Asagi hisse -->
            <form action="{{ route('userpanel.create_bulk_order') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container rounded bg-white py-2 shadowBox">
                    <div class="row p-4">
                        <span class="col-12 bulkOrderDownHeaderText mb-3 ms-3">Select the file</span>
                        <div
                            class="border rounded py-5 col-12 d-flex flex-column justify-content-center align-items-center">
                            <svg width="113" height="105" viewBox="0 0 113 105" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M91.9011 27.2799C90.6928 20.0997 87.1376 13.547 81.7002 8.57433C75.6587 3.04401 67.8047 0 59.6253 0C53.305 0 47.1472 1.81246 41.8725 5.22825C37.4808 8.06313 33.8326 11.8972 31.2533 16.4051C30.138 16.196 28.9761 16.0798 27.8143 16.0798C17.9387 16.0798 9.89883 24.1197 9.89883 33.9953C9.89883 35.2733 10.0382 36.5048 10.2706 37.7131C3.88053 42.3605 0 49.8427 0 57.8129C0 64.2494 2.39338 70.5001 6.76188 75.4495C11.2466 80.5151 17.1719 83.5126 23.4923 83.8612C23.562 83.8612 23.6085 83.8612 23.6782 83.8612H43.6617C45.4045 83.8612 46.7987 82.467 46.7987 80.7242C46.7987 78.9815 45.4045 77.5873 43.6617 77.5873H23.7711C14.2673 77.0063 6.27391 67.9673 6.27391 57.7896C6.27391 51.2136 9.80588 45.0792 15.4989 41.7563C16.8234 40.9895 17.381 39.3862 16.8698 37.9455C16.4051 36.6907 16.1727 35.3662 16.1727 33.9488C16.1727 27.5355 21.401 22.3072 27.8143 22.3072C29.1853 22.3072 30.533 22.5396 31.7878 23.0043C33.3214 23.562 35.0177 22.8649 35.7148 21.401C40.06 12.176 49.4477 6.22743 59.6486 6.22743C73.3582 6.22743 84.6745 16.498 85.9757 30.1147C86.1152 31.5322 87.184 32.6708 88.5782 32.9031C98.9186 34.6691 106.726 44.2194 106.726 55.1174C106.726 66.666 97.6406 76.7043 86.4405 77.564H69.315C67.5723 77.564 66.1781 78.9582 66.1781 80.701C66.1781 82.4437 67.5723 83.8379 69.315 83.8379H86.5567C86.6264 83.8379 86.6961 83.8379 86.789 83.8379C93.8762 83.3267 100.499 80.0736 105.425 74.6362C110.328 69.2453 113 62.3208 113 55.1174C112.977 42.0816 104.077 30.4865 91.9011 27.2799Z"
                                    fill="#68D7FA" />
                                <path
                                    d="M75.3327 60.7876C76.5643 59.556 76.5643 57.5809 75.3327 56.3494L58.7185 39.7351C58.1376 39.1542 57.3243 38.8057 56.511 38.8057C55.6977 38.8057 54.8844 39.131 54.3035 39.7351L37.6893 56.3494C36.4577 57.5809 36.4577 59.556 37.6893 60.7876C38.2934 61.3917 39.1067 61.717 39.8968 61.717C40.6868 61.717 41.5001 61.415 42.1043 60.7876L53.3741 49.5178V101.312C53.3741 103.055 54.7683 104.449 56.511 104.449C58.2538 104.449 59.648 103.055 59.648 101.312V49.5178L70.9178 60.7876C72.1261 62.0191 74.1012 62.0191 75.3327 60.7876Z"
                                    fill="#68D7FA" />
                            </svg>
                            <span class="bulkOrderText mt-4">Drop files here</span>
                            <span class="bulkOrderText">or</span>
                            <span class="btn-file">
                                select files from your computer
                                <input type="file" name="order_file" />
                            </span>
                            <span class="bulkOrderText2 mb-5">(Maximum upload size 2MB)</span>
                        </div>
                    </div>
                </div>
                <div class="container py-2 d-flex justify-content-center mt-4">
                    <button class="btn btn-lg btn-primary btnBulk shadowBox" type="submit">
                        <i class="fa-solid fa-check text-white"></i> Confirm Order
                    </button>
                </div>
            </form>

            <!-- End Asagi hisse -->

        </section>
    </section>
@endsection
