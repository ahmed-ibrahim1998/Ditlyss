const Ziggy = {"url":"http:\/\/dietless.test","port":null,"defaults":{},"routes":{"debugbar.openhandler":{"uri":"_debugbar\/open","methods":["GET","HEAD"]},"debugbar.clockwork":{"uri":"_debugbar\/clockwork\/{id}","methods":["GET","HEAD"]},"debugbar.telescope":{"uri":"_debugbar\/telescope\/{id}","methods":["GET","HEAD"]},"debugbar.assets.css":{"uri":"_debugbar\/assets\/stylesheets","methods":["GET","HEAD"]},"debugbar.assets.js":{"uri":"_debugbar\/assets\/javascript","methods":["GET","HEAD"]},"debugbar.cache.delete":{"uri":"_debugbar\/cache\/{key}\/{tags?}","methods":["DELETE"]},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.update":{"uri":"reset-password","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"]},"user-password.update":{"uri":"user\/password","methods":["PUT"]},"password.confirm":{"uri":"user\/confirm-password","methods":["GET","HEAD"]},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"]},"two-factor.login":{"uri":"two-factor-challenge","methods":["GET","HEAD"]},"two-factor.enable":{"uri":"user\/two-factor-authentication","methods":["POST"]},"two-factor.disable":{"uri":"user\/two-factor-authentication","methods":["DELETE"]},"two-factor.qr-code":{"uri":"user\/two-factor-qr-code","methods":["GET","HEAD"]},"two-factor.recovery-codes":{"uri":"user\/two-factor-recovery-codes","methods":["GET","HEAD"]},"profile.show":{"uri":"user\/profile","methods":["GET","HEAD"]},"livewire.message":{"uri":"livewire\/message\/{name}","methods":["POST"]},"livewire.upload-file":{"uri":"livewire\/upload-file","methods":["POST"]},"livewire.preview-file":{"uri":"livewire\/preview-file\/{filename}","methods":["GET","HEAD"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"switch-language":{"uri":"set-language\/{language}","methods":["GET","HEAD"]},"admin.index":{"uri":"admin","methods":["GET","HEAD"]},"countries.index":{"uri":"locations\/countries","methods":["GET","HEAD"]},"countries.create":{"uri":"locations\/countries\/create","methods":["GET","HEAD"]},"countries.store":{"uri":"locations\/countries","methods":["POST"]},"countries.show":{"uri":"locations\/countries\/{country}","methods":["GET","HEAD"]},"countries.edit":{"uri":"locations\/countries\/{country}\/edit","methods":["GET","HEAD"]},"countries.update":{"uri":"locations\/countries\/{country}","methods":["PUT","PATCH"]},"countries.destroy":{"uri":"locations\/countries\/{country}","methods":["DELETE"]},"get-all->orders":{"uri":"api\/order","methods":["GET","HEAD"]},"order.index":{"uri":"admin\/order","methods":["GET","HEAD"]},"order.create":{"uri":"admin\/order\/create","methods":["GET","HEAD"]},"order.store":{"uri":"admin\/order","methods":["POST"]},"order.show":{"uri":"admin\/order\/{order}","methods":["GET","HEAD"]},"order.edit":{"uri":"admin\/order\/{order}\/edit","methods":["GET","HEAD"]},"order.update":{"uri":"admin\/order\/{order}","methods":["PUT","PATCH"]},"order.destroy":{"uri":"admin\/order\/{order}","methods":["DELETE"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    for (let name in window.Ziggy.routes) {
        Ziggy.routes[name] = window.Ziggy.routes[name];
    }
}

export { Ziggy };