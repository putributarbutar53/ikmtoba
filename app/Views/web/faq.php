<!-- home.php -->
<?php $this->extend('web/layout/main') ?>

<?php $this->section('content') ?>

<div class="tp-faq-breadcrumb-area pt-50 pb-190">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="tp-portfolio-breadcrumb-content mt-95">
                            <h2 class="tp-portfolio-breadcrumb-title">Pertanyaan & Jawaban</h2>
                            <p class="tp-portfolio-breadcrumb-body"><span><a href="<?= base_url() ?>">Beranda</a></span> <span class="spacing">/</span> FAQ</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-50">
                        <div class="tp-faq-breadcrumb-img d-flex justify-content-end">
                            <img src="<?= base_url() ?>/lapor/img/faq/faq-bradcream-thumb.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="faq-area pt-100 pb-100">
    <div class="container">
        <div class="tp-faq-item-1 pb-50">
            <div class="row">
                <div class="col-lg-12 mb-30">
                    <div class="tp-faq-wrapper">
                        <div class="accordion" id="general_faqaccordion">
                            <div class="accordion-item tp-faq-inr-pg-accordion-item">
                                <h2 class="accordion-header" id="faq_one">
                                    <button class="accordion-button tp-faq-inr-pg-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse_one" aria-expanded="true" aria-controls="faq_collapse_one">
                                        Apa itu Survey Kepuasan Pelayanan (SKP)?
                                    </button>
                                </h2>
                                <div id="faq_collapse_one" class="accordion-collapse collapse show" aria-labelledby="faq_one" data-bs-parent="#general_faqaccordion">
                                    <div class="accordion-body tp-faq-inr-pg-accordion-body">
                                        <p>Survey Kepuasan Pelayanan (SKP) adalah alat yang digunakan untuk mengukur tingkat kepuasan masyarakat terhadap layanan yang diberikan oleh Pemerintah Kabupaten Toba.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item tp-faq-inr-pg-accordion-item">
                                <h2 class="accordion-header" id="faq_two">
                                    <button class="accordion-button collapsed tp-faq-inr-pg-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse_two" aria-expanded="false" aria-controls="faq_collapse_two">
                                        Bagaimana cara saya mengisi SKP?
                                    </button>
                                </h2>
                                <div id="faq_collapse_two" class="accordion-collapse collapse" aria-labelledby="faq_two" data-bs-parent="#general_faqaccordion">
                                    <div class="accordion-body tp-faq-inr-pg-accordion-body">
                                        <p>Anda dapat mengisi SKP melalui situs web ini dengan mengikuti tautan yang telah disediakan. Pastikan Anda mengisi semua kolom yang diperlukan dengan informasi yang akurat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item tp-faq-inr-pg-accordion-item">
                                <h2 class="accordion-header" id="faq_three">
                                    <button class="accordion-button collapsed tp-faq-inr-pg-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse_three" aria-expanded="false" aria-controls="faq_collapse_three">
                                        Apa manfaat dari mengikuti SKP?
                                    </button>
                                </h2>
                                <div id="faq_collapse_three" class="accordion-collapse collapse" aria-labelledby="faq_three" data-bs-parent="#general_faqaccordion">
                                    <div class="accordion-body tp-faq-inr-pg-accordion-body">
                                        <p>Dengan mengikuti SKP, Anda membantu Pemerintah Kabupaten Toba untuk memahami dan meningkatkan kualitas layanan publik yang diberikan. Masukan Anda sangat berharga untuk perbaikan berkelanjutan.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item tp-faq-inr-pg-accordion-item">
                                <h2 class="accordion-header" id="faq_four">
                                    <button class="accordion-button collapsed tp-faq-inr-pg-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse_four" aria-expanded="false" aria-controls="faq_collapse_four">
                                        Apakah data pribadi saya aman?
                                    </button>
                                </h2>
                                <div id="faq_collapse_four" class="accordion-collapse collapse" aria-labelledby="faq_four" data-bs-parent="#general_faqaccordion">
                                    <div class="accordion-body tp-faq-inr-pg-accordion-body">
                                        <p>Ya, data pribadi Anda akan dijaga kerahasiaannya dan hanya akan digunakan untuk keperluan analisis kepuasan masyarakat terkait layanan yang diberikan.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item tp-faq-inr-pg-accordion-item">
                                <h2 class="accordion-header" id="faq_five">
                                    <button class="accordion-button collapsed tp-faq-inr-pg-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse_five" aria-expanded="false" aria-controls="faq_collapse_five">
                                        Bagaimana saya bisa mendapatkan hasil SKP?
                                    </button>
                                </h2>
                                <div id="faq_collapse_five" class="accordion-collapse collapse" aria-labelledby="faq_five" data-bs-parent="#general_faqaccordion">
                                    <div class="accordion-body tp-faq-inr-pg-accordion-body">
                                        <p>Hasil dari SKP akan dipublikasikan di situs web ini setelah analisis selesai dilakukan. Anda bisa memeriksa bagian hasil survei untuk informasi lebih lanjut.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item tp-faq-inr-pg-accordion-item">
                                <h2 class="accordion-header" id="faq_six">
                                    <button class="accordion-button collapsed tp-faq-inr-pg-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse_six" aria-expanded="false" aria-controls="faq_collapse_six">
                                        Siapa yang dapat saya hubungi jika saya memiliki pertanyaan lebih lanjut?
                                    </button>
                                </h2>
                                <div id="faq_collapse_six" class="accordion-collapse collapse" aria-labelledby="faq_six" data-bs-parent="#general_faqaccordion">
                                    <div class="accordion-body tp-faq-inr-pg-accordion-body">
                                        <p>Jika Anda memiliki pertanyaan lebih lanjut, Anda dapat menghubungi kami melalui informasi kontak yang tersedia di situs web ini. Tim kami siap membantu Anda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rating Section -->
                    <div class="rating-container" style="margin-top: 30px;">
                        <div id="star-rating">
                            <span class="fa fa-star star" id="star-1" data-value="1"></span>
                            <span class="fa fa-star star" id="star-2" data-value="2"></span>
                            <span class="fa fa-star star" id="star-3" data-value="3"></span>
                            <span class="fa fa-star star" id="star-4" data-value="4"></span>
                            <span class="fa fa-star star" id="star-5" data-value="5"></span>
                        </div>
                        <p id="rating-result" style="margin-top: 10px;"></p>
                    </div>

                    <!-- CSS Styles -->
                    <style>
                        .star {
                            font-size: 24px; /* Adjust the size as needed */
                            color: gray; /* Default color for stars */
                            cursor: pointer; /* Change cursor to pointer on hover */
                        }

                        .star.checked {
                            color: gold; /* Color when star is checked */
                        }
                    </style>

                    <!-- jQuery for star rating -->
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            // Handle star click event
                            $(".star").on("click", function() {
                                var ratingValue = $(this).data('value');
                                // Set all stars to unchecked
                                $(".star").removeClass("checked");
                                // Set stars up to the clicked one to checked
                                for (var i = 1; i <= ratingValue; i++) {
                                    $("#star-" + i).addClass("checked");
                                }
                                // Display selected rating
                                $("#rating-result").text("Anda memberi rating: " + ratingValue);

                                // Send the rating to the server using AJAX
                                $.ajax({
                                    url: "<?= base_url('ratingcontroller/save') ?>",
                                    method: "POST",
                                    data: { rating: ratingValue },
                                    success: function(response) {
                                        if (response.status === 'success') {
                                            alert("Rating berhasil disimpan!");
                                        } else {
                                            alert("Gagal menyimpan rating.");
                                        }
                                    },
                                    error: function() {
                                        alert("Terjadi kesalahan. Silakan coba lagi.");
                                    }
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>
