<script>
  let globalUrl = '';
  let globalTourName = ''
  openShare = (data) => {
    data = JSON.parse(data);
    let url = '{{ route("by_name", [":description" ,":country", ":district", ":tour_name"]) }}'
    url = url.replace(':description', data['description']);
    url = url.replace(':country', data['country']);
    url = url.replace(':district', data['district']);
    url = url.replace(':tour_name', data['tour_name']);
    globalUrl = url;
    globalTourName = data['tour_name']
    console.log(url)
    $('#url-tour').text(url)
  }

 

  copyLinkPath = () => {
    var TempText = document.createElement("input");
    TempText.value = globalUrl;
    document.body.appendChild(TempText);
    TempText.select();
    TempText.focus();

    
    document.execCommand("copy");
    document.body.removeChild(TempText);

    var sticky = UIkit.sticky('.sticky', {
        offset: 50,
        top: 100
    });

    var notifications =  UIkit.notification('Link Copied', 'success');
  }


  copyEmbed2 = () => {
    console.log(globalUrl,'bbobobobo')
    var TempText = document.createElement("input");
    TempText.value = `<iframe width="5 60" height="315" src="${globalUrl}" title="${globalTourName}" ' frameborder="0"></iframe>`;
    document.body.appendChild(TempText);
    TempText.select();
    TempText.focus();
    document.execCommand("copy");
    document.body.removeChild(TempText);
    var sticky = UIkit.sticky('.sticky', {
        offset: 50,
        top: 100
    });

    var notifications = UIkit.notification('Embed Copied', 'success');
  }


  openApp2 = (openLink) => {
    var TempText = document.createElement("input");
    TempText.value = globalUrl;
    document.body.appendChild(TempText);
    TempText.select();
    
    document.execCommand("copy");
    document.body.removeChild(TempText);

    var sticky = UIkit.sticky('.sticky', {
        offset: 50,
        top: 100
    });

    var notifications =   UIkit.notification('Link Copied', 'success');
    if(notifications){
      setTimeout(()=>{
        if(openLink == 'viber'){
          window.open('viber://pa?chatURI')
        }
        if(openLink == 'wazap'){
          window.open('https://api.whatsapp.com/send?phone=0000000')
        }
        if(openLink == 'twitter'){
          window.open(`https://twitter.com/intent/tweet?text=${globalTourName}&url=${globalUrl}`)
        }
        if(openLink == 'fb'){
          window.open(`https://www.facebook.com/sharer/sharer.php?u=${globalUrl}`)
        }
        if(openLink == 'fbms'){
          window.open('https://www.messenger.com/t')
        }
      },1500)
    }

  }

  shareGmail = ( ) => {
    let gmailLink = `mailto:yourfriendsemail@sample.com?subject=${globalTourName}&body=No. of hotels : 150  visit the link ${globalUrl}`
    $("#gmail-send").attr("href", gmailLink)
    
  }
</script>

<style>
  .social-media-share> img{
    margin: auto 35%;
  }
  #gmail-send{
    margin: auto 35%;
  }
  .bg-copy-link{
    background: #4c4c4c;
  }
  .text-link {
    color: #63a2ff!important;
  }
  .text-link:hover {
    color: white!important;
  }
</style>

<!-- Modal -->
<div class="modal fade" id="global-share" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header mx-3">
        <h5 class="modal-title" id="exampleModalLabel">Share</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-1 my-3">
        <div class="row">
          <div class="col-10 mx-auto">
            <div uk-slider="sets: true">
              <div class="uk-position-relative">
                  <div class="uk-slider-container uk-light">
                      <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                          <li class="pointer social-media-share" onclick="openApp2('fb')">
                              <img src="{{ asset('image/socialmedia/fb.png')}}"  alt="fb">
                          </li>
                          <li class="pointer social-media-share" onclick="openApp2('fbms')">
                              <img src="{{ asset('image/socialmedia/msg.png')}}" alt="">
                          </li>
                          <li class="pointer social-media-share" onclick="openApp2('twitter')">
                              <img src="{{ asset('image/socialmedia/tw.png')}}" alt="">
                          </li>
                          <!-- /.tw -->
                            <li class="pointer social-media-share" onclick="openApp2('viber')">
                              <img src="{{ asset('image/socialmedia/vb.png')}}" alt="">
                          </li>
                          <!-- /.viber -->
                          <li class="pointer social-media-share">
                              <a id="gmail-send" onclick="shareGmail()" href="javascript:void(0)"><img src="{{ asset('image/socialmedia/gm.png')}}" alt=""></a>
                          </li>
                          <!-- /.gm -->
                          <li class="pointer social-media-share">
                            <img src="{{ asset('image/socialmedia/we.png')}}" alt="">
                          </li>
                          <li class="pointer social-media-share" onclick="copyLinkPath()">
                              <img src="{{ asset('image/socialmedia/cc.png')}}"  alt="cc">
                          </li>
                          <!-- /.cc -->
                          <li class="pointer social-media-share" onclick="copyEmbed2()">
                              <img src="{{ asset('image/socialmedia/em.png')}}"  alt="fb">
                          </li>
                          <!-- /.embed -->
                      </ul>
                  </div>

                  <div class="uk-hidden@s uk-light">
                      <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                      <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                  </div>

                  <div class="uk-visible@s">
                      <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                      <a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                  </div>

              </div>

              <!-- <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul> -->

            </div>
            <!-- /.ukslider -->
          </div>
          <!-- /.col -->
          <div class="col-11 mx-auto mt-4 bg-copy-link">
            <a class="copy-link" onclick="copyLinkPath()">
            <div class="row g-0">
              <div class="col-8 text-start">
              <span id="url-tour" class="elips-1 text-light"></span>
              </div>
              <div class="col-4 text-end  text-link">
                Copy Link
              </div>
            </div>
            </a>

          </div>
          <!-- /.col -->
        </div>
      </div>
      <div class="modal-footer mx-4">
      </div>
    </div>
  </div>
</div>