<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('content'); ?>
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(<?= base_url() ?>/assets/img/illustrations/corner-4.png);">
    </div>
    <!--/.bg-holder-->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <h5 class="mb-0">Jumlah Survey Berdasarkan Pertanyaan : </h5>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Chart Kepuasan -->
    <div class="col-md-6 mb-4">
        <div class="card bg-light h-100">
            <div class="card-body">
                <p class="card-title text-center font-weight-bold small" style="font-size: 0.875rem;">Jumlah Survey Berdasarkan Kepuasan</p>
                <div class="d-flex flex-wrap align-items-center">
                    <!-- Chart -->
                    <div class="flex-grow-1">
                        <canvas id="chart-pie-satisfaction"></canvas>
                    </div>
                    <!-- Legend langsung di kanan chart -->
                    <div class="ml-4">
                        <ul id="satisfaction-legend" class="list-unstyled"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loop untuk setiap pertanyaan -->
    <?php foreach ($questionCounts as $question) : ?>
        <div class="col-md-6 mb-4">
            <div class="card bg-light h-100">
                <div class="card-body">
                    <p class="card-title text-center font-weight-bold small" style="font-size: 0.875rem;">Pertanyaan: <?= $question['question'] ?></p>
                    <div class="d-flex flex-wrap align-items-center">
                        <!-- Chart -->
                        <div class="flex-grow-1">
                            <canvas id="chart-pie-question-<?= $question['id_question'] ?>"></canvas>
                        </div>
                        <!-- Legend langsung di kanan chart -->
                        <div class="ml-4">
                            <ul id="question-legend-<?= $question['id_question'] ?>" class="list-unstyled"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const colors = ['#36a2eb', '#4bc0c0', '#ffcd56', '#ff6384']; // Warna untuk chart

        // Fungsi untuk membuat legend
        function generateLegendHTML(labels, data, colors) {
            return labels.map((label, index) => `
                <li>
                    <span style="background-color: ${colors[index]}; width: 10px; height: 10px; display: inline-block; margin-right: 5px;"></span>
                    ${label}: ${data[index]} orang
                </li>
            `).join('');
        }

        // Chart Kepuasan
        const ctxSatisfaction = document.getElementById('chart-pie-satisfaction').getContext('2d');
        const satisfactionCounts = <?= json_encode($satisfactionCounts) ?>;

        const satisfactionLabels = ['Sangat Puas', 'Puas', 'Kurang Puas', 'Tidak Puas'];
        const satisfactionData = [
            satisfactionCounts.sangat_puas,
            satisfactionCounts.puas,
            satisfactionCounts.kurang_puas,
            satisfactionCounts.tidak_puas
        ];

        document.getElementById('satisfaction-legend').innerHTML = generateLegendHTML(satisfactionLabels, satisfactionData, colors);

        new Chart(ctxSatisfaction, {
            type: 'pie',
            data: {
                labels: satisfactionLabels,
                datasets: [{
                    data: satisfactionData,
                    backgroundColor: colors
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false // Sembunyikan legend bawaan
                    }
                }
            }
        });

        // Loop untuk setiap pertanyaan
        <?php foreach ($questionCounts as $question) : ?>
            const ctxQuestion<?= $question['id_question'] ?> = document.getElementById('chart-pie-question-<?= $question['id_question'] ?>').getContext('2d');
            const questionCounts<?= $question['id_question'] ?> = <?= json_encode($question) ?>;

            const questionLabels<?= $question['id_question'] ?> = [
                '<?= $question['option1_name'] ?>',
                '<?= $question['option2_name'] ?>',
                '<?= $question['option3_name'] ?>',
                '<?= $question['option4_name'] ?>'
            ];
            const questionData<?= $question['id_question'] ?> = [
                questionCounts<?= $question['id_question'] ?>['count_option1'],
                questionCounts<?= $question['id_question'] ?>['count_option2'],
                questionCounts<?= $question['id_question'] ?>['count_option3'],
                questionCounts<?= $question['id_question'] ?>['count_option4']
            ];

            document.getElementById('question-legend-<?= $question['id_question'] ?>').innerHTML = generateLegendHTML(questionLabels<?= $question['id_question'] ?>, questionData<?= $question['id_question'] ?>, colors);

            new Chart(ctxQuestion<?= $question['id_question'] ?>, {
                type: 'pie',
                data: {
                    labels: questionLabels<?= $question['id_question'] ?>,
                    datasets: [{
                        data: questionData<?= $question['id_question'] ?>,
                        backgroundColor: colors
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false // Sembunyikan legend bawaan
                        }
                    }
                }
            });
        <?php endforeach; ?>
    });
</script>

<?= $this->endSection(); ?>