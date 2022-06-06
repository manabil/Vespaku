@extends('layout.page')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/graph">{{ $title }}</a></li>
    </ol>
    <h2>{{ $title }}</h2>
  </div>
</section><!-- End Breadcrumbs -->
@endsection


<!-- ======= Blog Single Section ======= -->
@section('content')
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row">

      <div class="entries">

        <article class="entry entry-single">

          <canvas id="myChart" width="auto" height="700"></canvas>
          {{-- <script>
            const labels = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];
            const data = {
              labels: labels,
              datasets: [{
                axis: 'y',
                label: 'My First Dataset',
                data: [65, 59, 80, 81, 56, 55, 40],
                fill: false,
                backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 205, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                  'rgb(255, 99, 132)',
                  'rgb(255, 159, 64)',
                  'rgb(255, 205, 86)',
                  'rgb(75, 192, 192)',
                  'rgb(54, 162, 235)',
                  'rgb(153, 102, 255)',
                  'rgb(201, 203, 207)'
                ],
                borderWidth: 1
              },{
                axis: 'y',
                label: 'Jos Dataset',
                data: [50, 67, 74, 53, 78, 42, 40],
                fill: false,
                backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 205, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                  'rgb(255, 99, 132)',
                  'rgb(255, 159, 64)',
                  'rgb(255, 205, 86)',
                  'rgb(75, 192, 192)',
                  'rgb(54, 162, 235)',
                  'rgb(153, 102, 255)',
                  'rgb(201, 203, 207)'
                ],
                borderWidth: 1
              }]
            };
            const config = {
              type: 'line',
              data: data,
              options: {
                indexAxis: 'y',
                scales: {
                  x: {
                    beginAtZero: true
                  }
                }
              }
            };

            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, config);
          </script> --}}

          {{-- <script>
            const labels = {!! $listPangkat !!};
            console.log(labels);
            const ctx = document.getElementById('myChart').getContext('2d');

            const data = {
              labels: labels,
              datasets: [
              {
                label: 'My First dataset1',
                color: 'orange',
                backgroundColor: 'green',
                borderColor: 'greenlight',
                data: [0, 10, 5, 2, 20, 30, 45],
              },
              {
                label: 'My First dataset2',
                backgroundColor: 'rgb(255, 99, 0)',
                borderColor: 'rgb(255, 99, 0)',
                data: [1, 20, 2, 5, 13, 25, 5],
              },
              {
                label: 'My First dataset3',
                backgroundColor: 'rgb(255, 0, 80)',
                borderColor: 'rgb(255, 0, 80)',
                data: [2, 23, 2, 7, 24, 29, 50],
              }]
            };

            const config = {
              type: 'line',
              data: data,
              options: {}
            };

            const myChart = new Chart(
              document.getElementById('myChart').getContext('2d'),
              config
            );
          </script> --}}

          {{-- <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const labels = {!! $listPangkat !!}.reverse();
            const year = {!! $listTahun !!}.reverse();
            const now = new Date().getFullYear();
            
            const masaJabatan = [];
            for (let i in labels){
              if (labels.length == 1){
                masaJabatan.push([year[0], `${now}`]);
                break;
              } else if (i == 0) {
                masaJabatan.push([year[i], year[eval(i+1)]]);
              } else if (labels.length - 1 == i) {
                masaJabatan.push([year[i], `${now}`]);
                break
              } else {
                masaJabatan.push([year[i], year[eval(i)+1]]);
              }
            }

            const data = {
              labels: labels,
              datasets: [{
                data: masaJabatan,
                backgroundColor: [
                  'rgba(255, 26, 104, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(0, 0, 0, 1)'
                ],
                borderColor: [
                  'rgba(255, 26, 104, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(0, 0, 0, 1)'
                ],
                // barPercentage: 0.2,
              }]
            };

            const labelTooltip = (tooltipItems) => {
              console.log(tooltipItems.formattedValue);
              let rawDate = tooltipItems.formattedValue;
              console.log(rawDate);
              return tooltipItems.formattedValue;
            }
            
            const config = {
              type: 'line',
              data: data,
              options: {
                responsive: true,
                indexAxis: 'y',
                scales: {
                  x: {
                    ticks: {
                      autoSkip: true,
                      maxTicksLimit: 16
                    },
                    min: year[0],
                    max: `${now}`,
                    type: 'time',
                    grid: {
                      display: false,
                    },
                    time: {
                      unit: 'year'
                    }
                  },
                  y: {
                    grid: {
                      display: false,
                    }
                  }
                },
                plugins: {
                  legend: {
                    display: false
                  },
                  tooltip: {
                    callbacks: {
                      label: labelTooltip
                    }
                  }
                }
              }
            };

            const myChart = new Chart(
              document.getElementById('myChart').getContext('2d'),
              config
            );
          </script> --}}

          <script>
            const dataUser = {!! $listUser !!}

            const data = {
              labels: {!! $listTahun !!},
              datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: dataUser,
              }]
            };
          
            const config = {
              type: 'line',
              data: data,
              options: {
                scales: {
                  y: {
                    ticks: {
                      maxTicksLimit: 50,
                      sampleSize: 15,
                      callback: function(value, index) {
                        console.log(index);
                        return dataUser[index];
                      }
                    }
                  },
                },
              },
            };

            const myChart = new Chart(
              document.getElementById('myChart'),
              config
            );
          </script>

        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->

    </div>

  </div>
</section><!-- End Blog Single Section -->
@endsection


@section('footer')
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

  <div class="container">
    <div class="copyright">
    Copyright &copy; <strong><span>Balai Pengembangan Multimedia Pendidikan dan Kebudayaan</span></strong>
    </div>
    <div class="credits">
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
</div>
</footer><!-- End Footer -->
@endsection