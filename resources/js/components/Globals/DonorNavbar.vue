<template>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->

    <!-- If Dashboard Link-->
    <ul v-if="finalRoute == 'myDonations'" class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu">
          <i class="fa fa-bars"></i>
        </a>
      </li>
    </ul>
      <ul v-if="finalRoute == 'home'" class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu">
          <i class="fa fa-bars"></i>
        </a>
      </li>
    </ul>

    <!-- If Administrations Link -->
<ul v-if="finalRoute == 'requestBlood'" class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu">
          <i class="fa fa-bars"></i>
        </a>
      </li>
    </ul>

    <ul v-if="finalRoute == 'myAgencies'" class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu">
          <i class="fa fa-bars"></i>
        </a>
      </li>
    </ul>

    <!-- If Blood Inventory Link -->
    <!-- <ul v-show="['Blood Inventory'].includes($route.name)" class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu"><i class="fa fa-bars"></i></a>
      </li> 
      <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Blood Unit
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <router-link class="dropdown-item" to="/bloodInventory/registerUnit">Register Blood Unit</router-link>
            <router-link class="dropdown-item" to="/bloodTyping">Blood Typing</router-link>
            <router-link class="dropdown-item" to="/bloodProcessing">Blood Processing</router-link>
            <router-link class="dropdown-item" to="/bloodTesting">Blood Testing</router-link>
            <router-link class="dropdown-item" to="/bloodReactions">For Confirmatory Reactive Units</router-link>
            <router-link class="dropdown-item" to="/bloodDiscard">Blood Discard</router-link>
            <router-link class="dropdown-item" to="/bloodLabel">Blood Label</router-link>
            <router-link class="dropdown-item" to="/labelReprint">Label Reprint</router-link>
            <router-link class="dropdown-item" to="/unsharedUnits">Share Unscreened Units</router-link>
          </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Blood Stocks
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Release to Inventory</a>
              <a class="dropdown-item" href="#">Available Blood Stocks</a>
              <a class="dropdown-item" href="#">Inventory Status</a>
            </div>
          </li>
    </ul>-->

    <ul v-if="finalRoute == 'bloodInventory'" class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu">
          <i class="fa fa-bars"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a
          class="nav-link dropdown-toggle"
          href="#"
          id="navbarDropdownMenuLink"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >Blood Unit</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <router-link class="dropdown-item" to="/bloodInventory/registerUnit">Register Blood Unit</router-link>
          <router-link class="dropdown-item" to="/bloodInventory/bloodTyping">Blood Typing</router-link>
          <router-link class="dropdown-item" to="/bloodInventory/bloodProcessing">Blood Processing</router-link>
          <router-link class="dropdown-item" to="/bloodInventory/bloodTesting">Blood Testing</router-link>
          <router-link class="dropdown-item" to="/bloodInventory/bloodReactions">For Confirmatory Reactive Units</router-link>
          <router-link class="dropdown-item" to="/bloodInventory/bloodDiscard">Blood Discard</router-link>
          <router-link class="dropdown-item" to="/bloodInventory/bloodLabel">Blood Label</router-link>
          <router-link class="dropdown-item" to="/bloodInventory/labelReprint">Label Reprint</router-link>
          <router-link class="dropdown-item" to="/bloodInventory/unsharedUnits">Share Unscreened Units</router-link>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a
          class="nav-link dropdown-toggle"
          href="#"
          id="navbarDropdownMenuLink"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >Blood Stocks</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Release to Inventory</a>
          <a class="dropdown-item" href="#">Available Blood Stocks</a>
          <a class="dropdown-item" href="#">Inventory Status</a>
        </div>
      </li>
    </ul>

    <!-- If Blood Request Link -->
    <ul v-if="finalRoute =='bloodRequest'" class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu">
          <i class="fa fa-bars"></i>
        </a>
      </li>
    </ul>

    <!-- If Donors and Agencies Link -->
    <ul v-if="finalRoute == 'donorsAgencies'" class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu">
          <i class="fa fa-bars"></i>
        </a>
      </li>

      <li class="nav-item">
        <router-link class="nav-link" to="/donorsAgencies/donors">Donors</router-link>
      </li>
      <li class="nav-item">
        <router-link class="nav-link" to="/donorsAgencies/agencies">Agencies</router-link>
      </li>
    </ul>

    <!-- If Blood Demand Planning Link -->
    <ul v-if="finalRoute == 'demandPlanning'" class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu">
          <i class="fa fa-bars"></i>
        </a>
      </li>
    </ul>

    <!-- If Blood Programs Link -->
    <ul v-if="finalRoute == 'bloodPrograms'" class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu">
          <i class="fa fa-bars"></i>
        </a>
      </li>
      <li class="nav-item">
        <router-link class="nav-link" to="/bloodPrograms/MBDs">MBD</router-link>
      </li>
      <li class="nav-item">
        <router-link class="nav-link" to="/bloodPrograms/Walkins">Walk-in</router-link>
      </li>
    </ul>

    <!-- If Report Generation Link -->
    <ul v-if="finalRoute == 'reportGeneration'" class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu">
          <i class="fa fa-bars"></i>
        </a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  data() {
    return {};
  },
  computed: {
    finalRoute() {
      var route = this.$route.path;
      var parent_route = route.substr(1);
      var final_route = route.substr(1, parent_route.indexOf("/"));
      if(parent_route.includes('/')){
        final_route = route.substr(1, parent_route.indexOf("/"));
      } else {
        final_route = parent_route;
      }
      console.log(final_route);
      return final_route;
    }
  },
  created() {

  }
};
</script>