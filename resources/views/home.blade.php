@include('head')
                <div class="card">
                    <div class="card-header text-center">
                      <h5>Select Location</h5>
                    </div>
                    <div class="card-body">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                          <td>
                                            <label for="provinces">Choose a Province:</label>
                                          </td>
                                          <td>
                                            <select class="form-select" id="provinces" name="provinces" style="width: 75%"></select>
                                          </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="regencies">Choose a City:</label>
                                            </td>
                                            <td>
                                                <select  class="form-select" id="regencies" name="regencies" style="width: 75%"></select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="districts">Choose a District:</label>
                                            </td>
                                            <td>
                                                <select   class="form-select" id="districts" name="districts" style="width: 75%"></select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="villages">Choose a SubDistrict:</label>
                                            </td>
                                            <td>
                                                <select  class="form-select" id="villages" name="villages" style="width: 75%"></select>
                                            </td>
                                        </tr>
                                      </tbody>
                                </table>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-grid gap-2 col-3 mx-auto">
                            <a href="/subscribe" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Subscribe</a>
                        </div>
                    </div>
                  </div>
@include('footer')