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

          <canvas id="myChart" width="auto" height="200vh"></canvas>
          <script>
            const dataUser = {!! $listUser !!}
            const dataObj = {!! $listPangkat !!};
            const datasets = {!! $datasets !!};
            const dataIdv = {!! $data !!};
            const dataPangkat = {!! $label_pangkat !!};
            const dataJabatan = {!! $label_jabatan !!};
            const titleTooltips = (tooltipItem) => {
              return tooltipItem[0].dataset.label;
            };
            const afterTitleTooltips = (tooltipItem) => {
              return `(${tooltipItem[0].label})`;
            };
            const labelTooltips = (tooltipItem) => {
              // if(dataPangkat[tooltipItem.datasetIndex] === undefined){
              //   return 'Data pangkat belum diisi';
              // }
              // if(dataPangkat[tooltipItem.datasetIndex][tooltipItem.label] === undefined){
              //   let i = 0;
              //   let output = dataPangkat[tooltipItem.datasetIndex][tooltipItem.label];
              //   while (output === undefined) {
              //     output = dataPangkat[tooltipItem.datasetIndex][tooltipItem.label - i];
              //     i++;
              //     if(i > {!! $listTahun !!}.length){
              //       return dataPangkat[tooltipItem.datasetIndex][Object.keys(dataPangkat[tooltipItem.datasetIndex])[0]];
              //     }
              //   }
              //   return output;
              // }
              console.log(dataPangkat);
              try {
                return dataPangkat[tooltipItem.datasetIndex][tooltipItem.label];
              } catch (error) {
                return '';
              }
            };
            const afterLabelTooltips = (tooltipItem) => {
              // if(dataJabatan[tooltipItem.datasetIndex] === undefined){
              //   return 'Data jabatan belum diisi';
              // }
              // else if(dataJabatan[tooltipItem.datasetIndex][tooltipItem.label] === undefined){
              //   let i = 0;
              //   let output = dataJabatan[tooltipItem.datasetIndex][tooltipItem.label];
              //   while (output === undefined) {
              //     output = dataJabatan[tooltipItem.datasetIndex][tooltipItem.label - i];
              //     i++;
              //     if(i > {!! $listTahun !!}.length){
              //       return dataJabatan[tooltipItem.datasetIndex][Object.keys(dataJabatan[tooltipItem.datasetIndex])[0]];
              //     }
              //   }
              //   return output;
              // }
              try {
                return dataJabatan[tooltipItem.datasetIndex][tooltipItem.label];
              } catch (error) {
                return '';
              }
            };
            const footerTooltips = (tooltipItem) => {
              // console.log(dataPangkat[tooltipItem[0].datasetIndex][tooltipItem[0].label]);
              try {
                if(dataJabatan[tooltipItem[0].datasetIndex][tooltipItem[0].label] === undefined){
                return 'Kenaikan Pangkat';
                }
                else if (dataPangkat[tooltipItem[0].datasetIndex][tooltipItem[0].label] === undefined) {
                  return 'Kenaikan Jabatan';
                }
                else{
                  return 'Kenaikan Pangkat dan Jabatan';
                }
              } catch (error) {
                return 'Kenaikan Pangkat';
              }
              
              // try {
              //   if(dataJabatan[tooltipItem.datasetIndex] === undefined && dataPangkat[tooltipItem[0].datasetIndex][tooltipItem[0].label] !== undefined){
              //     if(dataPangkat[tooltipItem[0].datasetIndex][tooltipItem[0].label] === 'CPNS'){
              //       return 'Terdaftar CPNS';
              //     }
              //     return 'Kenaikan Pangkat';
              //   }
              //   else if(dataPangkat[tooltipItem.datasetIndex] === undefined && dataJabatan[tooltipItem[0].datasetIndex][tooltipItem[0].label] !== undefined){
              //     return 'Kenaikan Jabatan';
              //   }
              //   else if(dataJabatan[tooltipItem[0].datasetIndex][tooltipItem[0].label] === undefined){
              //     return 'Kenaikan Pangkat';
              //   } else if (dataPangkat[tooltipItem[0].datasetIndex][tooltipItem[0].label] === undefined) {
              //     return 'Kenaikan Jabatan';
              //   } else {
              //     return 'Kenaikan Pangkat dan Jabatan';
              //   }
              // } catch (error) {
              //   return 'Kenaikan Jabatan';
              // }
            };


            const data = {
              labels: {!! $listTahun !!},
              datasets: dataIdv
            };

            const config = {
              type: 'line',
              data: data,
              options: {
                plugins: {
                  legend: {
                    display: false
                  },
                  tooltip: {
                    backgroundColor: '#f6f9ff',
                    titleColor: '#012970',
                    titleAlign: 'center',
                    titleFont: {
                      size: '13',
                      weight: 'bold'
                    },
                    bodyColor: '#000',
                    bodyAlign: 'center',
                    footerColor: 'green',
                    footerAlign: 'center',
                    footerFont: {
                      size: '13',
                      weight: 'bold'
                    },
                    displayColors: false,
                    borderColor: '#012970',
                    borderWidth: 1,
                    titleMarginBottom: 8,
                    callbacks: {
                      title: titleTooltips,
                      afterTitle: afterTitleTooltips,
                      label: labelTooltips,
                      afterLabel: afterLabelTooltips,
                      footer: footerTooltips,
                    }
                  },
                },
                scales: {
                  y: {
                    // min:-0.1,
                    // max:2.6,
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

            const ctx = document.getElementById('myChart');
            function clikcHandler(click) {
              const points = myChart.getElementsAtEventForMode(click, 'nearest', {intersect: true}, true);
              if(points.length){
                const link = myChart.data.datasets[points[0].datasetIndex].link;
                window.open(link, '_blank');
              }
            }
            ctx.onclick = clikcHandler;
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