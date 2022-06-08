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

          <canvas id="myChart" width="auto" height="auto"></canvas>
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
              options: {
                scales: {
                  y: {
                    ticks: {
                      maxTicksLimit: 15,
                      sampleSize: 15,
                      callback: function(value, index) {
                        return index;
                      }
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
            const dataObj = {!! $pangkats !!};
            const jos = [{
              tahun:'2000', pangkat:{
                ilsa: 0,
                erik: 0.1,
                januar: 0.2,
                a: 0.3,
                b: 0.4,
                c: 0.5,
                d: 0.6,
                e: 0.7,
                f: 0.8,
                g: 0.9,
                h: 1,
                i: 1.1,
                j: 1.2,
                k: 1.3,
                l: 1.4,
                m: 1.5,
                n: 1.6,
                o: 1.7,
                p: 1.8,
                q: 1.9,
                r: 2,
                s: 2.1,
                t: 2.2,
                u: 2.3,
                v: 2.4,
              }
            },{
              tahun:'2013', pangkat:{
                ilsa: 0,
                erik: 0.1,
                januar: 0.2,
                a: 0.3,
                b: 0.4,
                c: 0.5,
                d: 0.6,
                e: 0.7,
                f: 0.8,
                g: 0.9,
                h: 1,
                i: 1.1,
                j: 1.2,
                k: 1.3,
                l: 1.4,
                m: 1.5,
                n: 1.6,
                o: 1.7,
                p: 1.8,
                q: 1.9,
                r: 2,
                s: 2.1,
                t: 2.2,
                u: 2.3,
                v: 2.4,
              }
            },{
              tahun:'2017', pangkat:{
                ilsa: 0,
                erik: 0.1,
                januar: 0.2,
                a: 0.3,
                b: 0.4,
                c: 0.5,
                d: 0.6,
                e: 0.7,
                f: 0.8,
                g: 0.9,
                h: 1,
                i: 1.1,
                j: 1.2,
                k: 1.3,
                l: 1.4,
                m: 1.5,
                n: 1.6,
                o: 1.7,
                p: 1.8,
                q: 1.9,
                r: 2,
                s: 2.1,
                t: 2.2,
                u: 2.3,
                v: 2.4,
              }
            },{
              tahun:'2019', pangkat:{
                erik: 0.1,
                ilsa: 0,
                januar: 0.2,
              }
            },{
              tahun:'2020', pangkat:{
                ilsa: 0,
                januar: 0.2,
              }
            },{
              tahun:'2018', pangkat:{
                erik: null,
                ilsa: null,
                januar: null,
              }
            },]

            const data = {
              labels: {!! $listTahun !!},
              datasets: [{
                label: 'Ilsa',
                backgroundColor: 'red',
                borderColor: 'red',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.ilsa'
                }
              },
              {
                label: 'Erik',
                backgroundColor: 'orange',
                borderColor: 'orange',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.erik'
                }
              },{
                label: 'Januar',
                backgroundColor: 'salmon',
                borderColor: 'salmon',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.januar'
                }
              },
              {
                label: 'a',
                backgroundColor: 'green',
                borderColor: 'green',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.a'
                }
              },{
                label: 'b',
                backgroundColor: 'blue',
                borderColor: 'blue',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.b'
                }
              },{
                label: 'c',
                backgroundColor: 'grey',
                borderColor: 'grey',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.c'
                }
              },{
                label: 'd',
                backgroundColor: 'purple',
                borderColor: 'purple',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.d'
                }
              },{
                label: 'e',
                backgroundColor: 'violet',
                borderColor: 'violet',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.e'
                }
              },{
                label: 'f',
                backgroundColor: 'maroon',
                borderColor: 'maroon',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.f'
                }
              },{
                label: 'g',
                backgroundColor: 'pink',
                borderColor: 'pink',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.g'
                }
              },{
                label: 'h',
                backgroundColor: 'brown',
                borderColor: 'brown',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.h'
                }
              },{
                label: 'i',
                backgroundColor: 'red',
                borderColor: 'red',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.i'
                }
              },{
                label: 'j',
                backgroundColor: 'orange',
                borderColor: 'orange',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.j'
                }
              },{
                label: 'k',
                backgroundColor: 'salmon',
                borderColor: 'salmon',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.k'
                }
              },{
                label: 'l',
                backgroundColor: 'blue',
                borderColor: 'blue',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.l'
                }
              },{
                label: 'm',
                backgroundColor: 'purple',
                borderColor: 'purple',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.m'
                }
              },{
                label: 'n',
                backgroundColor: 'violet',
                borderColor: 'violet',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.n'
                }
              },{
                label: 'o',
                backgroundColor: 'grey',
                borderColor: 'grey',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.o'
                }
              },{
                label: 'p',
                backgroundColor: 'red',
                borderColor: 'red',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.p'
                }
              },{
                label: 'q',
                backgroundColor: 'orange',
                borderColor: 'orange',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.q'
                }
              },{
                label: 'r',
                backgroundColor: 'salmon',
                borderColor: 'salmon',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.r'
                }
              },{
                label: 's',
                backgroundColor: 'green',
                borderColor: 'green',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.s'
                }
              },{
                label: 't',
                backgroundColor: 'blue',
                borderColor: 'blue',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.t'
                }
              },{
                label: 'u',
                backgroundColor: 'violet',
                borderColor: 'violet',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.u'
                }
              },{
                label: 'v',
                backgroundColor: 'purple',
                borderColor: 'purple',
                data: jos,
                parsing: {
                  xAxisKey: 'tahun',
                  yAxisKey: 'pangkat.v'
                }
              },]
            };
          
            const config = {
              type: 'line',
              data: data,
              options: {
                plugins: {
                  legend: {
                    display: false
                  },
                },
                scales: {
                  y: {
                    grid: {
                      display: false
                    },
                    ticks: {
                      maxTicksLimit: dataUser.length,
                      sampleSize: dataUser.length,
                      callback: function(value, index) {
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