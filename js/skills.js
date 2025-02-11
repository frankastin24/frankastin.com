

const skillsCanvas = document.getElementById('skills-canvas');

skillsCanvas.width = window.innerWidth / 3;
skillsCanvas.height = window.innerHeight;
const sctx = skillsCanvas.getContext('2d');

sctx.font = '30px sans-serif';
sctx.fillStyle = 'white';
sctx.fillText('SKILLS', skillsCanvas.width / 2, skillsCanvas.height / 2)

sctx.beginPath();
sctx.arc(skillsCanvas.width / 2, skillsCanvas.height / 2, 100, 0, 2 * Math.PI);
sctx.stroke();







