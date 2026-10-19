/* CONFIGURAÇÃO: número internacional sem +, espaços ou pontuação.
   Obtido do site original. Confirme antes de publicar. */
const CONFIG = window.SITE_CONFIG;
const TEXT = window.SITE_I18N || {};
const t = (key) => TEXT[key] || key;
// Preserve secção atual ao mudar o idioma (o servidor guarda a preferência num cookie).
document.querySelectorAll('.language-switcher a').forEach(link => {
  link.addEventListener('click', () => {
    if (window.location.hash) link.href = link.href.split('#')[0] + window.location.hash;
  });
});
/* Conteúdos dos projetos: edite aqui. Prints originais em assets/. */
const PROJECTS = {
 escaler:{title:'Escaler',category:t('js.escaler.category'),copy:t('js.escaler.copy'),tags:['E-commerce',t('js.escaler.collections'),t('js.escaler.content')],url:'https://escaler.com.br/'},
 aguiar:{title:'EstéticaAguiar',category:t('js.aguiar.category'),copy:t('js.aguiar.copy'),tags:[t('js.aguiar.tag'),'Website',t('js.escaler.content')],url:'https://www.esteticaguiar.net/'}
};
let selectedType='sistema';
const AREAS={
 mecanica:{description:t('js.area.mechanics'),modules:[t('js.module.maintenance'),t('js.module.tyres'),t('js.module.inventory'),t('js.module.fleet'),t('js.module.fuel'),t('js.module.lubrication'),t('js.module.cleaning')]},
 administracao:{description:t('js.area.admin'),modules:['HR',t('tag.administration'),t('js.module.accounting'),t('js.module.marketing'),'Chat']},
 operacao:{description:t('js.area.operations'),modules:[t('js.module.log'),t('js.module.inspection'),t('js.module.incidents')]}
};
const areaTabs=[...document.querySelectorAll('[data-area]')];
function selectArea(button){
 const data=AREAS[button.dataset.area];
 areaTabs.forEach(tab=>{const active=tab===button;tab.setAttribute('aria-selected',String(active));tab.tabIndex=active?0:-1;});
 document.querySelector('#area-panel').setAttribute('aria-labelledby',button.id);
 document.querySelector('#area-description').textContent=data.description;
 const container=document.querySelector('#area-modules');container.replaceChildren();
 data.modules.forEach(name=>{const chip=document.createElement('span');chip.textContent=name;container.append(chip);});
}
areaTabs.forEach((button,index)=>{
 button.addEventListener('click',()=>selectArea(button));
 button.addEventListener('keydown',event=>{let next;if(event.key==='ArrowRight')next=(index+1)%areaTabs.length;if(event.key==='ArrowLeft')next=(index-1+areaTabs.length)%areaTabs.length;if(event.key==='Home')next=0;if(event.key==='End')next=areaTabs.length-1;if(next!==undefined){event.preventDefault();selectArea(areaTabs[next]);areaTabs[next].focus();}});
});

// Inicializar apenas se a secção de módulos existir
if (areaTabs.length > 0) {
    selectArea(areaTabs[0]);
}
// Os prints abrem num modal nativo com suporte a Escape e teclado.
const imageDialog=document.querySelector('#image-dialog');
document.querySelectorAll('[data-image]').forEach(button=>button.addEventListener('click',()=>{
 const img=document.querySelector('#expanded-image');img.src=button.dataset.image;img.alt=button.dataset.caption;
 document.querySelector('#image-caption').textContent=button.dataset.caption;imageDialog.showModal();
}));
document.querySelector('.close-image').addEventListener('click',()=>imageDialog.close());
imageDialog.addEventListener('click',event=>{if(event.target===imageDialog){const r=imageDialog.getBoundingClientRect();if(event.clientX<r.left||event.clientX>r.right||event.clientY<r.top||event.clientY>r.bottom)imageDialog.close();}});

// Reveal progressivo: o conteúdo mantém-se visível quando JS ou observer não existem.
const reducedMotion=window.matchMedia('(prefers-reduced-motion: reduce)');
if('IntersectionObserver' in window && !reducedMotion.matches){
  document.documentElement.classList.add('js-motion');
  const observer=new IntersectionObserver(entries=>entries.forEach(entry=>{if(entry.isIntersecting){entry.target.classList.add('visible');observer.unobserve(entry.target);}}),{threshold:.08});
  document.querySelectorAll('.reveal').forEach(el=>observer.observe(el));
}
const progress=document.querySelector('.progress');
let scrollScheduled=false;
function updateProgress(){const distance=document.documentElement.scrollHeight-innerHeight;progress.style.width=`${distance>0?scrollY/distance*100:0}%`;scrollScheduled=false;}
window.addEventListener('scroll',()=>{if(!scrollScheduled){scrollScheduled=true;requestAnimationFrame(updateProgress);}},{passive:true});
window.addEventListener('resize',updateProgress);updateProgress();

// Movimento suave do retrato e cursor apenas em dispositivos com rato.
const hero=document.querySelector('.hero');
const cursor=document.querySelector('.cursor');
if(window.matchMedia('(pointer:fine)').matches && !reducedMotion.matches){
  hero.addEventListener('pointermove',event=>{const rect=hero.getBoundingClientRect();hero.style.setProperty('--portrait-x',`${((event.clientX-rect.left)/rect.width-.5)*14}px`);hero.style.setProperty('--portrait-y',`${((event.clientY-rect.top)/rect.height-.5)*10}px`);});
  hero.addEventListener('pointerleave',()=>{hero.style.setProperty('--portrait-x','0px');hero.style.setProperty('--portrait-y','0px');});
  document.querySelectorAll('.project-card').forEach(card=>{
    card.addEventListener('pointerenter',()=>cursor.classList.add('active'));
    card.addEventListener('pointerleave',()=>cursor.classList.remove('active'));
    card.addEventListener('pointermove',event=>{cursor.style.left=`${event.clientX}px`;cursor.style.top=`${event.clientY}px`;});
  });
}

// Modal nativo: suporta Escape, foco e teclado. Sem navegação para páginas vazias.
const dialog=document.querySelector('#project-dialog');
document.querySelectorAll('[data-project]').forEach(button=>button.addEventListener('click',()=>{
  const project=PROJECTS[button.dataset.project];document.querySelector('#dialog-title').textContent=project.title;document.querySelector('#dialog-category').textContent=project.category;document.querySelector('#dialog-copy').textContent=project.copy;
  const tags=document.querySelector('#dialog-tags');tags.replaceChildren();project.tags.forEach(text=>{const tag=document.createElement('span');tag.textContent=text;tags.append(tag);});
  document.querySelector('#project-live').href=project.url;cursor.classList.remove('active');dialog.showModal();
}));
document.querySelector('.close-dialog').addEventListener('click',()=>dialog.close());
dialog.addEventListener('click',event=>{const rect=dialog.getBoundingClientRect();if(event.target===dialog&&(event.clientX<rect.left||event.clientX>rect.right||event.clientY<rect.top||event.clientY>rect.bottom))dialog.close();});
document.querySelector('#dialog-cta').addEventListener('click',()=>dialog.close());

// Seleção de projeto e briefing. Não há armazenamento nem envio automático de dados.
const prompts={site:t('js.prompt.site'),sistema:t('contact.idea.label'),automação:t('js.prompt.automation')};
document.querySelectorAll('[data-type]').forEach(button=>button.addEventListener('click',()=>{
  selectedType=button.dataset.type;
  document.querySelectorAll('[data-type]').forEach(item=>{const active=item===button;item.classList.toggle('selected',active);item.setAttribute('aria-pressed',String(active));item.querySelector('i').textContent=active?'✓':'↗';});
  document.querySelector('#idea-label').firstChild.textContent=prompts[selectedType];
}));
function whatsappUrl(text){return `https://wa.me/${CONFIG.whatsapp}?text=${encodeURIComponent(text)}`;}
const whatsapp=document.querySelector('#whatsapp-link');whatsapp.href=whatsappUrl(t('js.whatsapp.initial'));whatsapp.target='_blank';whatsapp.rel='noopener noreferrer';
document.querySelector('#brief-form').addEventListener('submit',event=>{
  event.preventDefault();const form=event.currentTarget;const name=form.elements.nome.value.trim();const idea=form.elements.ideia.value.trim();
  if(!name||!idea){const input=!name?form.elements.nome:form.elements.ideia;input.setCustomValidity(t('js.error.required'));input.reportValidity();input.addEventListener('input',()=>input.setCustomValidity(''),{once:true});return;}
  const typeLabel = {'site': t('js.whatsapp.type.site'), 'sistema': t('js.whatsapp.type.system'), 'automação': t('js.whatsapp.type.automation')}[selectedType];
  const text = t('js.whatsapp.template')
    .replaceAll('{{name}}', name).replaceAll('{{type}}', typeLabel).replaceAll('{{idea}}', idea);
  // Navegação direta evita bloqueadores de popups. O visitante revê a mensagem antes de enviar.
  window.location.assign(whatsappUrl(text));
});
document.querySelector('#year').textContent=new Date().getFullYear();

/* ==========================================
   VOLTAR AO TOPO
   Mostrar após 20% da página
   ========================================== */
(function () {
    const button = document.getElementById('backToTop');
    if (!button) return;
    function updateBackToTop() {
        const scrollTotal =
            document.documentElement.scrollHeight - window.innerHeight;
        const limite = scrollTotal * 0.10;
        const mostrar = scrollTotal > 0 && window.scrollY >= limite;
        button.classList.toggle('visible', mostrar);
    }
    // Atualizar durante o scroll
    window.addEventListener('scroll', updateBackToTop, {
        passive: true
    });
    // Atualizar quando o tamanho da janela mudar
    window.addEventListener('resize', updateBackToTop);
    // Verificar também ao carregar a página
    updateBackToTop();
    // Subir suavemente ao início
    button.addEventListener('click', function () {
        const reduzirMovimento = window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;

        window.scrollTo({
            top: 0,
            behavior: reduzirMovimento ? 'instant' : 'smooth'
        });
    });
})();
