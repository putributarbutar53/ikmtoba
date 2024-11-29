<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <!-- Chart Jenis Kelamin -->
    <div class="col-sm-6 mb-4">
        <div class="card bg-light h-100">
            <div class="card-body">
                <div class="card-title">Jumlah Responden Berdasarkan Jenis Kelamin</div>
                <div class="row">
                    <div class="col-8">
                        <canvas class="max-w-100" id="chart-pie-gender"></canvas>
                    </div>
                    <div class="col-4">
                        <ul id="gender-legend" class="list-unstyled"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Pekerjaan -->
    <div class="col-sm-6 mb-4">
        <div class="card bg-light h-100">
            <div class="card-body">
                <div class="card-title">Jumlah Responden Berdasarkan Pekerjaan</div>
                <div class="row">
                    <div class="col-8">
                        <canvas class="max-w-100" id="chart-pie-job"></canvas>
                    </div>
                    <div class="col-4">
                        <ul id="job-legend" class="list-unstyled"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Pendidikan -->
    <div class="col-sm-6 mb-4">
        <div class="card bg-light h-100">
            <div class="card-body">
                <div class="card-title">Jumlah Responden Berdasarkan Pendidikan</div>
                <div class="row">
                    <div class="col-8">
                        <canvas class="max-w-100" id="chart-pie-education"></canvas>
                    </div>
                    <div class="col-4">
                        <ul id="education-legend" class="list-unstyled"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Chart Jenis Kelamin
        var ctxGender = document.getElementById('chart-pie-gender').getContext('2d');
        var genderCounts = <?= json_encode($genderCounts) ?>;

        var genderLabels = [];
        var genderData = [];
        var genderLegendHTML = '';
        var genderColors = ['#36a2eb', '#ff6384'];

        genderCounts.forEach(function(item, index) {
            var label = item.JK == 1 ? 'Laki-Laki' : 'Perempuan';
            genderLabels.push(label);
            genderData.push(item.count);
            genderLegendHTML += `<li><span style="background-color: ${genderColors[index]}; width: 12px; height: 12px; display: inline-block;"></span> <small>${label} : ${item.count}</small></li>`;
        });

        document.getElementById('gender-legend').innerHTML = genderLegendHTML;

        var chartGender = new Chart(ctxGender, {
            type: 'pie',
            data: {
                labels: genderLabels,
                datasets: [{
                    label: 'Jumlah Responden',
                    data: genderData,
                    backgroundColor: genderColors,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false, // Sembunyikan label di atas chart
                        onClick: function(e, legendItem, legend) {
                            var index = legendItem.index;
                            var meta = legend.chart.getDatasetMeta(0);
                            meta.data[index].hidden = !meta.data[index].hidden;
                            legend.chart.update();
                        }
                    }
                }
            }
        });

        // Chart Pekerjaan
        var ctxJob = document.getElementById('chart-pie-job').getContext('2d');
        var jobCounts = <?= json_encode($jobCounts) ?>;

        var jobLabels = [];
        var jobData = [];
        var jobLegendHTML = '';
        var jobColors = ['#ffcd56', '#ff6384', '#36a2eb', '#cc65fe', '#ff9f40'];

        jobCounts.forEach(function(item, index) {
            jobLabels.push(item.pekerjaan);
            jobData.push(item.count);
            jobLegendHTML += `<li><span style="background-color: ${jobColors[index]}; width: 12px; height: 12px; display: inline-block;"></span> <small>${item.pekerjaan} : ${item.count}</small></li>`;
        });

        document.getElementById('job-legend').innerHTML = jobLegendHTML;

        var chartJob = new Chart(ctxJob, {
            type: 'pie',
            data: {
                labels: jobLabels,
                datasets: [{
                    label: 'Jumlah Responden',
                    data: jobData,
                    backgroundColor: jobColors,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false, // Sembunyikan label di atas chart
                        onClick: function(e, legendItem, legend) {
                            var index = legendItem.index;
                            var meta = legend.chart.getDatasetMeta(0);
                            meta.data[index].hidden = !meta.data[index].hidden;
                            legend.chart.update();
                        }
                    }
                }
            }
        });

        // Chart Pendidikan
        var ctxEducation = document.getElementById('chart-pie-education').getContext('2d');
        var educationCounts = <?= json_encode($educationCounts) ?>;

        var educationLabels = [];
        var educationData = [];
        var educationLegendHTML = '';
        var educationColors = ['#36a2eb', '#4bc0c0', '#ffcd56', '#ff6384', '#9966ff', '#ff9f40'];

        educationCounts.forEach(function(item, index) {
            educationLabels.push(item.pendidikan);
            educationData.push(item.count);
            educationLegendHTML += `<li><span style="background-color: ${educationColors[index]}; width: 12px; height: 12px; display: inline-block;"></span> <small>${item.pendidikan} : ${item.count}</small></li>`;
        });

        document.getElementById('education-legend').innerHTML = educationLegendHTML;

        var chartEducation = new Chart(ctxEducation, {
            type: 'pie',
            data: {
                labels: educationLabels,
                datasets: [{
                    label: 'Jumlah Responden',
                    data: educationData,
                    backgroundColor: educationColors,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false, // Sembunyikan label di atas chart
                        onClick: function(e, legendItem, legend) {
                            var index = legendItem.index;
                            var meta = legend.chart.getDatasetMeta(0);
                            meta.data[index].hidden = !meta.data[index].hidden;
                            legend.chart.update();
                        }
                    }
                }
            }
        });
    });
</script>
<?= $this->endSection(); ?>