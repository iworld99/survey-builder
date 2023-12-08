<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>

    <style>
        .modal-content {

            width: 190%;

        }
        .ck.ck-editor__editable_inline>:last-child {
            height: 5rem;
        }
        .modal-header .btn-close {
            margin-left: 0rem;
        }
        .modal {
            height: 162%;
        }

        .card-body
        {
            margin: 1% 0%;
            background: whitesmoke;
            border: 1px solid #80808054;
            box-shadow: 1px 2px 3px 0px #8888885e;
            padding: 20px 32px 30px;
        }


        .text_type
        {
            border: 1px solid #aaa;
            padding: 0.5em 0.72em;
            background-color: #fff;
            font-size: 15px;
            font-weight: 400;
            line-height: 2.0;
            width: 44%;
        }

        .question_space
        {
            width: 100%;
            height: 150px;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            font-size: 16px;
            margin-bottom: 5%;
        }

/********Side Question List Css*********/

        .q-h6{
            color: #333;
            font-size: .82rem;
            font-weight: 500;
            line-height: 2.2;
            padding-left: 0.7rem
        }
        .q-ul{
            list-style: none;
            box-shadow: none;
            background-color: transparent;
            box-sizing: border-box;
            border-radius: 0;
            margin: 0;
            padding: 0;
            height: auto;
            overflow-y: auto;
        }
        .q-li{
            position: relative;
            display: block;
            padding: 10px 15px;
            margin-bottom: -1px;
            background-color: #fff;
            border: 1px solid #ddd;
            list-style-type: none;
        }
        .q-li:hover{
            cursor: pointer;
            border: 2px dotted #ADD8E6;
        }

/********ScrollBar Css*********/

        .down::-webkit-scrollbar,
        .q-ul::-webkit-scrollbar {
          width: 8px;
        }

        /* Track */
        .down::-webkit-scrollbar-track,
        .q-ul::-webkit-scrollbar-track {
          box-shadow: inset 0 0 5px #aaa;
          border-radius: 10px;
        }

        /* Handle */
        .down::-webkit-scrollbar-thumb,
        .q-ul::-webkit-scrollbar-thumb {
          background: #aaa;
          border-radius: 4px;
        }

        /* Handle on hover */
        .down::-webkit-scrollbar-thumb:hover,
        .q-ul::-webkit-scrollbar-thumb:hover {
          background: #aaa;
        }

/********Modal New Question Add*********/

        .modal.right .modal-dialog {
                position: fixed;
                margin: auto;
                width: 320px;
                height: 100%;
                -webkit-transform: translate3d(0%, 0, 0);
                    -ms-transform: translate3d(0%, 0, 0);
                     -o-transform: translate3d(0%, 0, 0);
                        transform: translate3d(0%, 0, 0);
            }


        .modal.right .modal-content {
                height: 100%;
                overflow-y: auto;
                width: 271%;
            }


        .modal.right .modal-body {
                padding: 15px 15px 80px;
            }



        .modal.right.fade .modal-dialog {
                right: 39.5%;
                -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
                   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
                     -o-transition: opacity 0.3s linear, right 0.3s ease-out;
                        transition: opacity 0.3s linear, right 0.3s ease-out;
            }

        .modal.right.fade.in .modal-dialog {
                right: 0;
            }


        .modal-content {
                border-radius: 0;
                border: none;
            }

        .modal-header {
                border-bottom-color: #EEEEEE;
                background-color: #FAFAFA;
            }


/********Modal preview Question*********/

        .modal.down .modal-dialog {
                position: fixed;
                margin: auto;
                width: 320px;
                height: 100%;
                -webkit-transform: translate3d(0%, 0, 0);
                    -ms-transform: translate3d(0%, 0, 0);
                     -o-transform: translate3d(0%, 0, 0);
                        transform: translate3d(0%, 0, 0);
            }


        .modal.down .modal-content {
                height: 100%;
                overflow-y: auto;
                width: 420%;
            }


        .modal.down .modal-body {
                padding: 15px 15px 80px;
            }



        .modal.down.fade .modal-dialog {
                right: 74.5%;
                -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
                   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
                     -o-transition: opacity 0.3s linear, right 0.3s ease-out;
                        transition: opacity 0.3s linear, right 0.3s ease-out;
            }

        .modal.down.fade.in .modal-dialog {
                right: 0;
            }

/*******  LOADER CSS ***********/
        .lds-dual-ring.hidden {
            display: none;
        }
        .lds-dual-ring {
          display: inline-block;
          width: 80px;
          height: 80px;
        }
        .lds-dual-ring:after {
          content: " ";
          display: block;
          width: 64px;
          height: 64px;
          margin: 21% auto;
          border-radius: 50%;
          border: 6px solid #fff;
          border-color: #00000042 transparent #00000042 transparent;
          animation: lds-dual-ring 1.2s linear infinite;
        }
        @keyframes lds-dual-ring {
          0% {
            transform: rotate(0deg);
          }
          100% {
            transform: rotate(360deg);
          }
        }


        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgb(0 0 0 / 20%);
            z-index: 2000;
            opacity: 1;
            transition: all 0.5s;
        }

    </style>
</head>
<body style="background: #e7e7e7;">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3" style="border: black;background: #e7e7e7; ">
            <nav class="navbar navbar-expand-lg navbar-dark bg-light">
                <ul class="navbar-nav mr-auto" style="margin-left:33%;">
                    <a href="{{route('survey')}}" type="button" class="btn btn-secondary" >Add Survey</a>
                </ul>
            </nav>
            <nav class="navbar navbar-expand-lg navbar-dark bg-light">
                <ul class="navbar-nav mr-auto">
                    <h6 class="q-h6">QUESTION TYPES</h6>
                </ul>
            </nav>

            <ul class="q-ul mb-2">
                @foreach ($question_type as $question_type)

                        <li class="q-li" ondragstart="dragStart(event,{{$question_type->id}})" draggable="true" >
                            <div>
                                {{$question_type->name}}
                            </div>
                        </li>

                @endforeach
            </ul>
        </div>
            <div class="col-md-9 p-4" id="targetcontainer" style="background: #80808014;" ondrop="drop(event)" ondragover="allowDrop(event)">

                <div id="previewContainer"></div>
            </div>
       </div>
        </div>
<div id="loader" class="lds-dual-ring hidden overlay"></div>



<script>
    function dragStart(event,id,name) {
        event.dataTransfer.setData("text/plain", id);
    }

    function allowDrop(event) {
        event.preventDefault();
    }

    function drop(event,id,name)
    {
        var id = event.dataTransfer.getData("text/plain");
        $('input[name=question_type_id]').val(id);

        var data = [];
        data['id'] = id;
        $.ajax({
        url: '{{ route('survey.question_option_choice') }}?id='+id,
        type: 'get',
        processData: false,
        contentType: false,
        data: data,
        success: function(response) {
            $('#option-choice').html(response);
        },
        error: function(xhr) {
        }
        });

        var launchbutton = document.getElementById('lauch');
         $("#id").val("");
         $("#textField").trigger('reset');
        launchbutton.click();

    }
</script>

<script>
    function editmodal(id,question_type_id)
    {
        $(document).ready()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        }

        var id = id;

        var data = [];
        data['id'] = question_type_id;

            $.ajax({
            url: '{{ route('survey.question_option_choice') }}?id='+question_type_id+'&question_id='+id,
            type: 'get',
            processData: false,
            contentType: false,
            data: data,
            beforeSend: function() {
                $('#loader').removeClass('hidden')
            },
            success: function(response) {
                $('#option-choice').html(response);
            },
            error: function(xhr) {
            },
            complete: function(){
                $('#loader').addClass('hidden')
                },
            });

            $.get('edit/'+id,function(res)
            {
                $("#id").val(res.id);
                $("#question").val(res.question);
                $("#survey_id").val(res.survey_id);
                $("#question_type_id").val(res.question_type_id);
                $("#exampleModal").modal('show');
            });
    }
</script>


<script>
    function newsaveData() {
    // var data = $('#testquestion').val();
     var form = document.getElementById('textField');
     var formData = new FormData(form);
     var edit_id = formData.get('id');
     console.log(edit_id);
        $.ajax({
            url: "{{ route('survey.save_partial_data') }}",
            type: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            beforeSend: function() {
                $('#loader').removeClass('hidden')
            },
            success: function(response) {

                $('#exampleModal').modal('hide');
                if(edit_id)
                {
                $('#card'+edit_id).replaceWith(response);
                $('#preview_card'+edit_id).replaceWith(response);
                }else{
                $('#cardBody').prepend(response);
                $('#preview_cardBody').prepend(response);
                 }
                 var listItens = document.getElementById('cardBody').querySelectorAll('.draggable');
                        [].forEach.call(listItens, function(item) {
                            console.log(item);
                          addEventsDragAndDrop(item);
                        });

                        function addEventsDragAndDrop(el) {
                          el.addEventListener('dragstart', newdragStart);
                          el.addEventListener('dragenter', newdragEnter);
                          el.addEventListener('dragover', newdragOver);
                          el.addEventListener('dragleave', newdragLeave);
                          el.addEventListener('drop', newdragDrop);
                          el.addEventListener('dragend', newdragEnd);
                        }
                 },
            error: function(xhr) {
                console.log(xhr.responseText);
                },
            complete: function(){
                $('#loader').addClass('hidden')
                },
        });
        }

   // window.onload(
   //   $.get('/survey/load-partial/{{$survey_id}}', function (response) {
   //      $('#targetcontainer').html(response);
   //  }));

</script>

<script>

    window.onload(
     $.get('/survey/load-partial/{{$survey_id}}', function (response) {
        $('#targetcontainer').html(response);
         
        var listItens = document.getElementById('cardBody').querySelectorAll('.draggable');
        [].forEach.call(listItens, function(item) {
          addEventsDragAndDrop(item);
          console.log(item);
        });

        function addEventsDragAndDrop(el) {
          el.addEventListener('dragstart', newdragStart);
          el.addEventListener('dragenter', newdragEnter);
          el.addEventListener('dragover', newdragOver);
          el.addEventListener('dragleave', newdragLeave);
          el.addEventListener('drop', newdragDrop);
          el.addEventListener('dragend', newdragEnd);
        }

    }));


    function newdragStart(e) {
        // e.stopPropagation();
      this.classList.add('dragging');
    event.dataTransfer.effectAllowed = 'move';
    // event.dataTransfer.setData('text/plain', this.innerHTML);
    };

    function newdragEnter(e) {
        e.preventDefault();
        e.stopPropagation();
    this.classList.add('over');
    }

    function newdragLeave(e) {
      e.stopPropagation();
      e.preventDefault();
      this.classList.remove('over');
    }

    function newdragOver(e) {
        e.stopPropagation();
        e.preventDefault();
        event.dataTransfer.dropEffect = 'move'
    }

    function newdragDrop(e) {
        e.stopPropagation();
      var sourceElement = document.querySelector('.dragging');
    if (sourceElement !== this) {
      var sourceOrderWeightage = parseInt(sourceElement.dataset.orderWeightage);
      var targetOrderWeightage = parseInt(this.dataset.orderWeightage);
      
      if (!this.contains(sourceElement)) {
      var listItems = document.getElementById('cardBody').querySelectorAll('.draggable');
      listItems.forEach(function(item) {
        var orderWeightage = parseInt(item.dataset.orderWeightage);
        if (item !== sourceElement) {
          if (orderWeightage === sourceOrderWeightage) {
            item.dataset.orderWeightage = targetOrderWeightage;
            item.querySelector('.order-weightage-input').value = targetOrderWeightage;
          } else if (targetOrderWeightage < sourceOrderWeightage && orderWeightage >= targetOrderWeightage && orderWeightage < sourceOrderWeightage) {
            item.dataset.orderWeightage = orderWeightage + 1;
            item.querySelector('.order-weightage-input').value = orderWeightage + 1;
          } else if (targetOrderWeightage > sourceOrderWeightage && orderWeightage <= targetOrderWeightage && orderWeightage > sourceOrderWeightage) {
            item.dataset.orderWeightage = orderWeightage - 1;
            item.querySelector('.order-weightage-input').value = orderWeightage - 1;
          }
        }
      });

      // sourceElement.classList.remove('dragging');

      // Update the source element's order weightage
      sourceElement.dataset.orderWeightage = targetOrderWeightage;
      sourceElement.querySelector('.order-weightage-input').value = targetOrderWeightage;

      // Sort the list items based on the updated order weightage
      var sortedItems = Array.from(listItems).sort(function(a, b) {
        return parseInt(b.dataset.orderWeightage) - parseInt(a.dataset.orderWeightage);
      });

      // Update the DOM with the sorted list items
      var draggableList = document.getElementById('cardBody');
      sortedItems.forEach(function(item) {
        draggableList.appendChild(item);
      });

      // Save the updated order to the database using AJAX
      saveOrderToDatabase();
      }
    }
        this.classList.remove('over');
    }

    function newdragEnd(e) {
        e.stopPropagation();
         // draggedItem = null;
      const listItems = document.getElementById('cardBody').querySelectorAll('.draggable');
            listItems.forEach(function(item) {
              item.classList.remove('over','dragging');
            });
    }

    function saveOrderToDatabase() {
    var listItems = document.getElementById('cardBody').querySelectorAll('.draggable');
    var updatedOrder = [];
    listItems.forEach(function(item) {
      var id = item.dataset.id;
      var orderWeightage = item.dataset.orderWeightage;
      var surveyID = item.dataset.surveyId;
      updatedOrder.push({
        id: id,
        orderWeightage: orderWeightage,
        surveyID : surveyID
      });
    });

    var newdata = JSON.stringify(updatedOrder);

    $.ajax({
            url: "{{ route('survey.order_weigtage_change') }}",
            type: 'POST',
            processData: false,
            contentType: 'application/json',
            data: newdata,
            beforeSend: function() {
                $('#loader').removeClass('hidden')
            },
            success: function(response) 
            {
                
                $('#preview_cardBody').html(response);
                 },
            error: function(xhr) {
                console.log(xhr.responseText);
                },
            complete: function(){
                $('#loader').addClass('hidden')
                },
        });

    
  }

  </script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


</body>
</html>

