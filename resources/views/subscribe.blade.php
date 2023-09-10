@include('head')
                <div class="card">
                    <div class="card-header text-center">
                      <h5>Subscribe</h5>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <form id="subsform" class="form-inline my-4">
                                    <div class="col my-1">
                                        <label class="sr-only mb-2" for="inlineFormInputGroupUsername">Get The latest Insight into Property and Infrastructure</label>
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                              </svg></div>
                                          </div>
                                          <input id="inputemail" type="email" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email" minlength="10"  pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" required>
                                          <button id="btnsubmit" type="button" class="btn btn-success">SEND</button>
                                        </div>
                                        <div class="mt-2 errormessage"></div>
                                        <div class="mt-2 successmessage"></div>
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-grid gap-2 col-3 mx-auto">
                            <a href="/" class="btn btn-warning btn-sm" tabindex="-1" role="button" aria-disabled="true">Back</a>
                        </div>
                    </div>
                </div>
@include('footer')