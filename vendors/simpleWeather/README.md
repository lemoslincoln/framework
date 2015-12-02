Descomentar os scripts no setup.php na função bigo_load_scripts

Aplicar CSS

#tempo {

    form.validacao {
      width: 100%;
      overflow: hidden;
      span {
        display: block;
        overflow: hidden;
        padding-right: 10px;
         input { 
          width: 100%;
          border: 1px solid fade(@sec, 50%);
          padding: 2px 5px;
          font-size: 12px;
        }
      }
      button {
        float: right;
        background-image: none;
        border: none;
        font-size: 12px;
        padding: 3px 8px;
        color: white;
        background-color: fade(@sec, 90%);
      }
    } // form.validacao

    #box {
      margin-top: 15px;
      p {
        margin-bottom: 0;
        &.cidade { font-weight: bold; font-size: @font-size-h4;}
      }
      .graficos {
        width: 100%;
        overflow: hidden;
        margin-top: 10px;
        img.icone {
          float: left;
        }
        .dados {
          display: block;
          overflow: hidden;
          background-repeat: no-repeat;
          background-position:  175px 35px;
          @media (max-width: @screen-md-max) { background-position:  230px 35px; }
          @media (max-width: @screen-sm-max) { background-position:  165px 35px; }

          .temp {
            font-size: @font-size-h3;
            color: @sec;
            font-weight: bold;
            border-bottom: 2px solid @pri;
            margin-bottom: 6px;
          }
          .condicao {
            p { display: inline-block; margin-right: 5px;}
          }
          .informacoes {
            ul {
              padding: 0;
              li {
                list-style: none;
              }
            }
          }
        }
      }
    }
  }