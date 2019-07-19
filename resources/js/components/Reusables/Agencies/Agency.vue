<template>
  <div>
    <b-modal id="agency" size="lg" hide-footer>
      <template slot="modal-title">Agency Overview</template>
      <div class="modal-body">
        <div class="row mt-3">
                <div class="row-title">{{agency.name}}</div>
            <div class = "col-md-3">
                
            </div>
            <div class = "col-md-9">
                <table class ="table table-sm table-striped">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <th> {{agency.name}} </th>
                            <td> {{agency.address}} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </b-modal>
  
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  props: {
    agency: Object
  }
};
</script>