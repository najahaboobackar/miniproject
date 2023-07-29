<!DOCTYPE html>
<html lang="en">
<head>
  <title>home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style1.css">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <style>
    /* Add your custom CSS styles here */
    .navbar {
      background-color: #f8f9fa;
      border-bottom: 1px solid #dee2e6;
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      font-weight: bold;
      color: #343a40;
    }

    .navbar-brand img {
      margin-right: 5px;
    }

    .navbar-nav .nav-link {
      color: #343a40;
    }

    .navbar-nav .nav-link:hover {
      color: #007bff;
    }

    .dropdown-menu {
      background-color: #f8f9fa;
    }

    .dropdown-item {
      color: #343a40;
    }

    .dropdown-item:hover {
      background-color: #007bff;
      color: #fff;
    }

    .body {
      position: relative;
      
      overflow: hidden;
    }

    .image-container {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }

    
.bottom {
  text-align: center;
  padding: 20px 0; /*Reduced padding to reduce the height of the container*/
}



    .bottom h1 {
      font-size: 40px;
      font-weight: bold;
      color: #343a40;
    }

    .bottom p {
      font-size: 18px;
      color: #343a40;
      line-height: 1.6;
    }

    .steps-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 50px;
    }

    .step {
      text-align: center;
      margin: 0 30px;
      opacity: 0;
      transform: translateY(50px);
      transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    .step.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .step-icon {
      font-size: 48px;
      color: #007bff;
      margin-bottom: 10px;
    }

    .step-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .step-description {
      font-size: 18px;
      margin-bottom: 20px;
    }

    .quote-container {
      
      text-align: center;
      padding: 70px 0;
      background-color: #f8f9fa;
    }

    .quote-container::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url('background-image.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      opacity: 0.8;
      z-index: -1;
    }

    .quote-text {
      font-size: 24px;
      color: black;
      animation: slideIn 1s ease-in-out;
      animation-delay: 0.5s;
      animation-fill-mode: forwards;
    }

    .footer {
  background-color: #343a40;
  color: #fff;
  padding: 10px 0; /* Reduced padding from 20px to 10px */
  text-align: center;

}


    .footer a {
      color: #fff;
      text-decoration: none;
      margin: 0 10px;
    }

    .footer a:hover {
      color: #007bff;
    }

    /* Animation */
    @keyframes fadeIn {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }

    @keyframes slideIn {
      0% { transform: translateY(50px); }
      100% { transform: translateY(0); }
    }

    @keyframes arrowBounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }


    /* Add more custom styles as needed */

    .container1{
  width:100vw;
  height:80vh;
  display:flex;
  justify-content:center;
  align-items:center;
}
.slider {
  height: 750px;
  width:100vw;
  display: flex;
  perspective: 1000px;
  position: relative;
  align-items:center;
}
.box1{      background:url('data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBYVFRgVEhUYGBgaGhgYGBgYGhIYGBISGBgZGRgYGBgcIS4lHB4rIRgYJjgmKy8xNTU1GiQ7QDs0Py40NTEBDAwMEA8QHxISHzQrJCw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ1NDQ0NDQ0NDQ0NP/AABEIALcBEwMBIgACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAAFAAECAwQGB//EAD0QAAEDAwMDAgMGBQIEBwAAAAEAAhEDBCEFEjFBUWEicQYTgTKRobHB8BRCUtHhQ7JygpLSBxUWIzNic//EABkBAAMBAQEAAAAAAAAAAAAAAAABAgMEBf/EACgRAAICAgICAQQBBQAAAAAAAAABAhEDIRIxBEFREyIycWEUM4GR0f/aAAwDAQACEQMRAD8AAUWTKF3UyR5KM2DJklCLoEuJHElYm6KWPITfxXZWujas7rcjMYTYGk1gRwotug3jlKi0HlPcWo5UN0XQbt6zKjM8x+KHgerbGFVpwIPhW1qnqws4qmy27SL7uw9Mqmwp9Co175x9P3qDqkDCp7Qvdh2jpsiZWas8slrlktNXe3CjfXRqHAys1BJ2ynLRVjciNvMeIT2Gm7hLkVNkAIC5snlY4y4nVj8Wco8jBb1GT6lOnqLQ+G8FV3GkuJ9CFV7F7HDcCO3lbRyRktGEoSi6Z2g1IADE+V0ek3bXtG1ct8PWoe0bgut06yDOEKTUqQnG42Ua4+GFcdXqmV1euulcvWpycLdHO3sqY8raymYVVO3PZFbSlLcpNlJA6m0h4RljSQqBS9SK29LClystKjmr9mShdF/rR7VmQSuepH1qV2DOjtn4U/m5VNgwvIa0ElH6Noyj6nQ5/wB4b7eV0Rg5GTdEbHTXO9T3bG+Rk/RarjUNhDHkOaSNr3DE8bXR9nwUOudS8/ihF5qIIIcQfHdTm8aEo9tSXTTKhd76DN7AcWsOcHYT6oPBb/UPxQW4vYxlCaF4Hk0KriJB+W/+ZkZGfE/ksF3evLiysD85kNcRH/utj0v8kxlc+HyJpuGTte/n+Tv/AKVOKlF+uv8Ahtubvyh1W48rHWrmYyPflZn1lu52YcaNvzvKSHfOKSjkOwqy4FOQSszyHgx1ULmjLpSZT7Fb+jkSMTm7eVdTup9JH+VC5oulU0bd0zCm2VQRpsaE10zGFCnTVz2GMrN2WKypEhaPktE7lC3rRhZ7jJKSbTK1RL5bXOUa9KOFQx0FbS9u0lDbYlRitqcuXRadpYkOcubo3MOnsuksL/fAWXlOSh9pt4sYynUg3TpgYHCc08pvluAlPbOkwV4FO99nuulHQRsy1pkjChqlBlWIATtGFbaszldMZyaUUcTjG3Jl+kWIYMI6xuFga8NC22tcOGF6uKOzzMsgLq9Mkofb2MnIXR3NvuKelagLZ3ZiqBTdP8K1lpARllJJ9HCOI7OffSgrZbuwrq1FVFkBZ20y+wJrR5QfStHfWfIG1gOXHge3c+F1f8A1x31TDB06u/sFVe3mNtNoDRwBxC3xw9yJk29Iva+nQZsp8xl+Jd9UGvtUGcodf3pAXPXN6StpZK0gjiXbCF3qUyhla8KyVKqodUXPLJZslRdXrk5aYIy09iFusdRbVc01WglozyHPa0O2NkZgOJB+iDOes9Nxa4/Rw9wcj64WM4qe/Z1+NlafH/Qc1mlscYiC4loEwGENcI8erhDSZRLVnCoabm/ZLAI7EY+/j7krbTy7os8cmoK+zPyG5ZGwZsSXRDSCkq5mfFkbikAg760ORytUBBhCLimAV13o40jO+4JctT7gBsRlYiIdK1vAcE7pDRnovMomHBzVgo01Oq/a3BUj6LGNyqq78qNGt+Kup05MqWUvgzBndWvZ6cLTWo4VVCkThSpWU1ToyNpAjCnaVnMcPoiX8KGtQp+HT5T/ACJ/E7+jehzPcKNsMyhFhcAsgFGbFuF4maEoybo9yEovGqYQoOlWvMcLNSMFbagEKYNtUZTpOwPf6k4enquh+HqssC5PVGje3yV1uiAbRC9rH0jycv5MOQFAlTKrctGZIspOVlThUMcpPfhUnoTWzO9UPIiTx27p6jxyfoEMvrryqjjS3Iu3LSMmpXTifCC3epBo5z+ShqN4cwfC5e4rEnKmeSjohGkaLy6Lihz3qTgqixYOdjZU5yir2054Wu209zjwpckFA5rSUTsNGL3MkGHO2+wIJn6bSug0z4Yc6C4QPK7Cw0pjG7doM8yOfopfJp8dDjNQaZyfw/ozXMNMkvgk54YZiR4PZdHbaOxgyJ/AIhYaWykXFhcd3cgxkmBjytLmJYsbSbn22Tmzcpfb0D/kt/pH3BOt/wAtJbcUY2zy6thuAgtcGZKO3VYbIQau+Qt0ZsiWemUzAYU6bCRha7enDTKbHExgYUaVEvOVvbQlVVG7MhZtFFAo7XLXRMuwsb6mZKtpvzIRVAaHuIdB4Wpr2tErNWeH46rJWxiVPei+tm2ndAkgoff1BuwrWsAgqm4IKpdkvo1WBIXZaU+Wri7JjncLp9MYWCSubyV9jbR0YG+SSDLmQU1ZxIhTpVg4LNfv2iQvGa+Gen2wVqVIzyuj+H3O2iUBgvOF1Wls2MEr18M1xSR5maH3Nhtr8KDnKunUlVVa4HBXWk5dHLSXZb8yFmrXfbP5D2VNWtP7wqCRErohjUf2S3yLaj+5Qi9dzGU95egIFe3zpxhKckbQi0Z78ZhBbiiZRR1ScnKz12f3+nZcM5W9G6QOAHv++FdbWrnnAx0K02unmq5uznA988O/uu+0rRm0mje0F3PcNP6lQk30KTUezntJ+GXPG53pHc9R4HVdbY6TTp/ZbJ7n+y3MCkQtIxSMZTbIhimBCZrlGq9WQM56dpWdrsq5hSsCyU6gkiwPJXgkFZn0vSioYsl0yFumiGgfbOLTlamVzwFRWpmJCjaH1ZVAtGxjime2TlSuMQQqg4nIUNlorqsEp7UCVVcvKpovSD2bH08yFnqU3Eq6nUVzaoAyp6HVkWshuUOecxK2V7oLC8dQmmxNBSyq7Aug0653hcrZUy7lHtKdswss8XOPE1wy4Ss6GjbGZHCv1Cj6EIp6m/IAUmXr3GHdVyQ8WKVM6peU7TCehsBOV0NxS9PpQKzAZkLRe6oQ2BjuewhdOPEm6RzzlKX3F1e+DG7Zz18IK/UtzolBtZvyxvMk8Sfvwhnw9qG41H1P5IwO5H6rsjUdIya9s7ltQmBPn2Ce7rhoiUJsa4Dd9R3MvJ8DgD6lC7zVNxJnnj2VTnSCEbY99d5whzqhcstW4Jd7rbp9sXkY7fiuKeQ6VH4NNvRJaf30ChQ9byAJEhs94x+auvqjp+TS4H23Dku6tHt+fsimkaftgAdp8BcsptukaJJK2HPh3TwwF5AkwB4jqi9RK1YGtAHACm8LrjGo0cU5cpNipFScVAYSc5UiGVlyg90p3NUS1OgsTArwFWwK5oSoLEknSQM80L1luKe5XsZJhVVvSYVre0Jl9C0BblCblm10IoyoY5Qu9puklCbsGkXUHB2CtLbfb7IJQqlrpKJuvZbATsaE63DiSh1SlDsIhTr4WZ46oGVBnZO9hTMenNRKhmZ7cq22pSne0ErbZ0YKG6QkrNFmwBE6FgSJWLAICMWdyNsLJyZdIz21u7f4Rd1sAJhVMe1uStDqwfAalF2DRPb6N37lc1q+oRug8Dr1KLa5d7GbGEefPlefXlw552iec/VbVwX8vsad/r0U6jqTqxniJEdkU+GrYmm8mYLx9Q1o/UrNbaaDEiSY9yujqBlJgpsA9IJcRwHHJRCSk3Q3F+wXqV67gHHH0CHtqlxACuuWTwtFnbBg3Pw45aIknpMfvhY5JlxixtPtHPLTHJP3AGfzC6F1RtFuxmXnkj/TH/dH3IfaXjhDKdMNaAGh07nx9cCUbt9NDRLxJ5z3Ocrkm3KVI3XGK2QsLQATwOvc+yMWPPhYkQ09qvFCn/Jjlnar0HKHCmVGiMKyF2HGyshNCmQoooBAKDgplRKYEWqyVFoUw1FBYySltTJ0KzlP/StdpkOY76kfmEOv/hu4mQwn2Lf7rum3PlS/iFajH0U4s8zOjXId/wDC+PZK50i5JgUH/wDSV6b85I1T3RxV9grPJ3/Dly7/AEH/AHLTa/DN1x8hw9ywfqvT95KrqEjqhpDVnBUPgq5POxvu/wDsCtR+A6pHqrMHsHn+y64vP9ShUrEdZRofFnIW3/h+8O9dwzb/APVjiSPqYCO2vwdasg1A556lzjH3NgLVUuCM/QrO7UhwTn/d3/BHKKDhJ9Gh+gWI/wBBvXq/kdOU9DTrUH00GfUTiPJWW51AEROcFrj/AFDv+R9ygFzrha4wCCDlvVv7zB6gqJZoo0jhbOo1P4Xt6wmkBSf3blp8Fk/iIQQfDNwx3DHjoWOGfo6CqrX4lyJd9/ZHKN8XlrmnGCT1j9E04TE8cogW5on7JBBHIOCPomDwxvp56nsOy7eo5j6btjBUcATsIJcHRiHHp9V5pqlbY2DLYwZwd3shY3jdt38CjLnpKgdqdcmS7np7ILXcGtL+XAiO5/wtdtSqV3uDRu2gvcejGDBc77wsGpvE7G8Dr3Kypydvo1bVUg38P3bXNdUeCA0gD7IO+J64gBK+uy8bsQeOCfeRgqiwtS2245JdIMOAPpwe3p4Q1zy53XGOkx5jn6rWoxhozuTlsI6bS3v9X2Rkns0ZJ/BEmVWZfUc1s8AkYb0CCazUdTt2hsjefW4SCGgiB/zGf+lCdOLcF2T1XK8PKPKzdZFF8aPS/h+3Y5pe07gDAMEAnxKI3CbQ6Oy3YYjcNwHg8KFy9KMEkRObbKQUU04IO1yNaaqitmcnoNUxhTKjT4TrcwYzlCU7imQAoUSpEqJQAwKmHqEKDiqAu3pKncmRYqAYv/Ksbf8AlcoL/wAp/wDzDysebO3ijrhfeU/8auSZqPlXs1Lyj6gcEdG+9J6kBUVb5o53fQoMdREcqg3kmZRzsaikG2aiCRO726LcyXAlrt3AjzyVzVC/YCJ6lHLO6Gdv76n9+EKXyPj8GG+vnsJ3cd/6T58eUJrX4d46/XuF0d1QbUz1/fK5e90dzZLHEeIx/hZScmWkkJ9+e/8Anz4Q++v2kQ/J6dx7FZa9u4faJ+n+FjqMaP5c/ipjG3tilJomdQIaWsGOSTlx/wCY5R74a1KrEgiGycmJYPz7Bcu6CY6D7Xnwi1k2sG/OawilxuIMPjq3wI5W/HWiYy3s9O0z4mDRhsO6jqqK+s06r3gim15HqeGsLgB0k8leYV9Re94e30lvHcLRb2wrgkksfkFwJgnuW8JuUvb1+hr6dulsIHUBTqudTDGkEjcxrQHwY9QAg/VBtSs3Pqsc0Cajw3aOj3HkeFqoabUY8MfG04DwQGz2dP2SqLHVwbqm4NO2m8GDySMfSE4N/wCCJ0/2egan8M0RTAl7H7QNzTgQIALOOFx9HR3se75jhDcuecAMiS49sLsq+uMfmccndiPcnAXIavqjau5lN0tJ9bxw4jhrT1A79cdlGTJydLoqMFGNvs03FBlxYXFRvjYOrGUDIB8mXE/8S47RuRPAK7/4Loh1CrTPG78Htg/kuK0+0+RcllVs7HkEHhwBwY7EQfqtItcGkY03I9Xp3QfRYQf5Y+4oVcPyjd5SYaLKlIbWkbS0fynkIBW5Wc7vYtD0yj2mlAKaO6ecJR7FLoNtclKqa5PuWxm0TJUZSlMXIEJzkgVU5ydrk0BaSq3FJzlFoTEPsSVsJIoVni3zHeU4c890YuKJ6LANw5WKxL5Oj6j+DO1ryeCpOD+uERtqfVVVmiZKaw/yH1WZNzhyU7Q48FWVojChb4yn9FfIvrMjUY4clENK1Qt9Lj1kLHcAuGAs1Gih4VXY45pJ9HZ0dQB6rYx4cMxnuuJa9zes+/ZbrTVTOVg4yj3s6o5Yy09Bu/smkekCUAuNHd1Ed4/JGrbUJMlWX96Nhjk4A6uceAE4uLG0ci/T9x2MGAPUew7T3XaW2p0XNLKoAY1oY1pgBrA0Rt7FQt7MU2BpEmNzyOp5dH5Ln/iqqYZVY1uzjaB6h7nqVt70QlSbAupWLg8vpGRJx3b0RHSq4ADXAtd54d7Hg+yosKxfAaMHlGHWoOW4PXsf+JvBWOSaf2yCMXfKJY9/Q5XK1rR1G7c0tiS1wHhwDv1I+hXW6dS2uEgc+4kdp4V/xfYB4p3DBlnpf/8AmTgn2d/uV404rfTM5PlL9AC4tnPIa8Q1xAcf6QcSgtix7ZYfS5pLXA8hwwQu2tgHASJBH5rJ8RaMRtuqYwQBVA6OHp3/AFgT9/dUmlcSpxpqQX+CmFjHNfB3GWkeBwfzVXxjowdFwwetsB4H8zOh9x+Xsq/hq4IcGng8fousOcFJNNNInIuElIB6PXcLctccEtj6ZWes/KMVbTENEDoEOrWJUxi0qZE5qUrRnY9HrFyCi0citiwjlUQwwHJByraCpBqtEMmXpi9IMKm2mqoVlSmArBTU2sQkJsq2q1rcKWxPCoRTvSS+WklYUee8qLqQjhWmiOQU7ngDOVFI0swOaYgLPcUjC3PeDwstVhJTTYNIGkQpPd6VtFqZCVbTDgolOkOEG3RZpNRm31D71C7LN3pVjLSAh92yCuKOVyyWmelPxuGKxxWBMJqrY4VVCjJlbHswu080haVVupk7mu52yQPKHUWQ5dBQoCAs8qS2aYpS+TK/UXu9Aw95jceGNjJ8rFqVMMfsc4uEAgn+bAnAxMrXeUNrp6KFS1c8tLYMch36FZu1E1UreynT9HDWF4kAnHMt8x1CLMt3wJ2x1IPP0KIW1J2yHADERyrba27pKPJXIJT4v7QbPqkCAOEXtTuaWuEtIIIPUFV3VqBkLRpgBXQkqowk32BLHTnh5ZtJAOHdC3oZXTmzGzYRIggjuDyt1G3V/wApKOKm2E88pJR+DmNN0T5TiZkA+n26SjFOlC3fLUHhVHHGK0RLJKX5EWU5TvtQeitpLSGp0S2DDZDspstYW8sThiOKFyMzaKsbSV8JwE6FZT8tSFNXwnhVQrM5pqTWK2E4CdBZVtTlishKEUFlWwJldCSVBZ5NnoYVlNm4ZTtYt9kxkZhc5uA6lMg4UqbSjNzatPCyU7Ug+Edh0Km2VdUBAVgAaqrioCss+sZ1eKuWRGZ4wgl6/wBSOOcIQC9b61yeL+R6nl/22abYZhabqntAKotjwm1CsSF6jtvR4GkiDagKOWLpHK5uiZC12tZ7T4SlDktjjLiFNScQIU7BpgErRbMFQZW2lbhuFhJ8VRrHbsoubotaqrS+JIUb+OFVbNEqo1xJl2Hy/c1ZrR2x5+9W08CFTVaZnuriyZI6WyrboRBrEC0owAjzDhbRdoxaIvYs76a2EKDmpsRQxi0NCYBTDUJBY0J4U4ShOhWRhPCkGp9qKCyKSnCbamIYJ4SSCAEkkkUCGSSSQB5ZTpl2AU7KMGJSSXI+zp9GwMI6p6ryAnSSvRS7MTqhJUHNKSS5/I/E7PE/Mpq8IFcu9SSSjxfyOvzG+BppOwkYcCkku9N8jx2tGZhActzq0DCSSoku0jUDuhdK6pIlJJKcUOEmBr58klPp78wUkkklQN7D1tSk8okbUOSSUlM3WtvtAW9jkklvHowkXtMpFiSSoQwapwkkmJkgpQkkgQySSSAEnSSQAxTEpkkCFuSlJJAClJJJAz//2Q==');
  background-size:cover;
  background-position:center center;}
.box2{
background:url('https://okcredit-blog-images-prod.storage.googleapis.com/2021/01/socialservice3.jpg');
  background-size:cover;
  background-position:center center;}
.box3{
background:url('https://content.jdmagicbox.com/comp/bhubaneshwar/i9/0674px674.x674.220130230648.x4i9/catalogue/jazba-humanity-first-bhubaneswar-bhubaneshwar-social-service-organisations-ko2898jnsp.jpg');
  background-size:cover;
  background-position:center center;}
.box4{
background:url('https://www.educationworld.in/wp-content/uploads/2021/07/Untitled-design-45.jpg');
  background-size:cover;
  background-position:center center;}
.box5{
background:url('https://www.deccanherald.com/sites/dh/files/styles/article_detail/public/articleimages/2021/10/19/file7hoeog0pcitjkmccenq-1042012-1634629503.jpg?itok=PgO1LNqA');
  background-size:cover;
  background-position:center center;}
.box6{
background:url('https://s3.youthkiawaaz.com/wp-content/uploads/2020/04/17155139/imig1_custom-b2b0f63f411fb6f3dabd3105d9555419d88ddafb-s800-c85.jpg');
  background-size:cover;
  background-position:center center;}
.box7{
background:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTar5XRbcGjsrc4uK9p19yfS8kaDVzZTbu49w&usqp=CAU');
  background-size:cover;
  background-position:center center;}

.slider [class*="box"] {
/*   float: left; */
  overflow: hidden;
  border-radius:20px;
  transition: all 1s cubic-bezier(0.68, -0.6, 0.32, 1.6);
    position:absolute;
}
.slider [class*="box"]:nth-child(7),
.slider [class*="box"]:nth-child(1) {
  width: 100vh;
  height: 60vh;
  transform: scale(0.2) translate(-50%,-50%);
  top: 10%;
  z-index:1;
}
.slider [class*="box"]:nth-child(2),
.slider [class*="box"]:nth-child(6) {
  width: 100vh;
  height: 60vh;
  transform: scale(0.4) translate(-50%,-50%);
  top: 20%;
  z-index:2;
}
.slider [class*="box"]:nth-child(3),
.slider [class*="box"]:nth-child(5) {
  width: 100vh;
  height: 60vh;
  transform: scale(0.6) translate(-50%,-50%);
  top: 30%;
  z-index:3;
}
.slider [class*="box"]:nth-child(4) {
  width: 60vw;
  height: 60vh;
  border-color: #c92026;
  color: #fff;
  transform: scale(1) translate(-50%,-50%);
  top: 50%;
  z-index:4;
}
.slider [class*="box"]:nth-child(1){
  left:-13%;}
.slider [class*="box"]:nth-child(2){
  left:-5%;}
.slider [class*="box"]:nth-child(3){
  left:10%;}
.slider [class*="box"]:nth-child(4){
  left:50%;}
.slider [class*="box"]:nth-child(5){
  left:71%;}
.slider [class*="box"]:nth-child(6){
  left:85%;}
.slider [class*="box"]:nth-child(7){
  left:100%;}
.slider .firstSlide {
    -webkit-animation:  firstChild 1s;
    animation:  firstChild 1s;
}
/*Animation for buyers landing page slider*/
@-webkit-keyframes firstChild {
    0% {left:100%; transform: scale(0.2) translate(-50%,-50%);}
    100% {left: -13%; transform: scale(0.2) translate(-50%,-50%);}
}
@keyframes firstChild {
   0% {left:100%; transform: scale(0.2) translate(-50%,-50%);}
    100% {left: -13%; transform: scale(0.2) translate(-50%,-50%);}
}
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="project-logo-final-1@2x.png" height="43px" alt="Logo">
     <b style="color:white"> SERVIT</b>
    </a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="#head">About Us</a>
      </li>
      <?php
      session_start();
      if(isset($_SESSION["user"])){
        echo '<li class="nav-item">
                <a class="nav-link text-dark" href="logout.php">Logout</a>
              </li>';
      } else {
        echo '<li class="nav-item dropdown">
        <a class="nav-link text-white dropdown-toggle" href="login.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Login
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="volunteer.php">Volunteer</a></li>
          <li><a class="dropdown-item" href="organiser.php">Organizer</a></li>
        </ul>
      </li>
      <li class="nav-item">
      <a class="nav-link text-black btn btn-primary bg-white" href="registration.php">Sign Up</a>
    </li>';
    
      }
      ?>
    </ul>
  </div>
</nav>

<div class="body">
  <div class="image-container">
  <div class="container1">
  <div class="slider">
    <div class="box1">
    </div>
    <div class="box2">
    </div>
    <div class="box3">
    </div>
    <div class="box4">
    </div>
    <div class="box5">
    </div>
    <div class="box6">
    </div>
    <div class="box7">
    </div>
  </div>
</div>
<div id="test"></div>
  </div>
  <div class="container1 text-center">
   
  </div>
</div>

<div class="bottom">
  <h1 id="head">
    About Us
  </h1>
  <p>
    Welcome to SERVIT, a dedicated platform for volunteering and making a positive impact on communities. Our mission is to connect passionate individuals with meaningful volunteer opportunities. We believe in the power of collective action and strive to create a world where everyone has the chance to contribute their time and skills for the betterment of society. Through our user-friendly platform, we aim to inspire and empower individuals to take part in various volunteer projects, ranging from environmental conservation and education to humanitarian aid and community development. Join us in making a difference and be a part of the change!
  </p>

  <div class="steps-container">
    <div class="step">
      <i class="step-icon fas fa-registered"></i>
      <h3 class="step-title">Step 1: Register as a Volunteer</h3>
      <p class="step-description">Create an account on our platform to become a registered volunteer.</p>
    </div>
    <div class="step">
      <i class="step-icon fas fa-user"></i>
      <h3 class="step-title">Step 2: Provide Your Name and Phone Number</h3>
      <p class="step-description">Enter your name and phone number to complete your volunteer profile.</p>
    </div>
    <div class="step">
      <i class="step-icon fas fa-handshake"></i>
      <h3 class="step-title">Step 3: Click Join Button</h3>
      <p class="step-description">Browse available volunteer opportunities and click the "Join" button to participate.</p>
    </div>
  </div>
</div>

<div class="quote-container">
  <h1 class="quote-text">"The best way to find yourself is to lose yourself in the service of others."</h1>
  <h1><a href="comment.php" >review</a></h1>
</div>

<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col">
        
        <a href="mailto:servit@gmail.com"><i class="fas fa-envelope"></i> servit@gmail.com</a>
      </div>
    </div>
  </div>
</footer>

<!-- Add Bootstrap JavaScript links if needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

<script>
  function rotate() {
  var lastChild = $('.slider div:last-child').clone();
  /*$('#test').html(lastChild)*/
  $('.slider div').removeClass('firstSlide')
  $('.slider div:last-child').remove();
  $('.slider').prepend(lastChild)
  $(lastChild).addClass('firstSlide')
}

window.setInterval(function(){
  rotate()
}, 3000);

  // Animation for the steps
  const steps = document.querySelectorAll('.step');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, {
    threshold: 0.2
  });

  steps.forEach((step) => {
    observer.observe(step);
  });

  // Animation for bouncing arrow
  const arrow = document.querySelector('.fa-chevron-down');
  arrow.animate([
    { transform: 'translateY(0)' },
    { transform: 'translateY(-10px)' },
    { transform: 'translateY(0)' }
  ], {
    duration: 1000,
    easing: 'ease-in-out',
    iterations: Infinity
  });
</script>
</body>
</html>
