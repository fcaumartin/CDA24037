import React from 'react';
import { HydraAdmin } from "@api-platform/admin";

function App() {

  // console.log("test")
  
  return (
      <div>
          <HydraAdmin entrypoint="https://127.0.0.1:8000/api/" />

        
      </div>
    );
}

export default App;
