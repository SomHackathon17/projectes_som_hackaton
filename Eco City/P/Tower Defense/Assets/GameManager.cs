using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class GameManager : MonoBehaviour {

	public static GameManager manager;

	public PacMan_Script pacMan_Script;

	public int numLives = 20;
	public Text lives;
	public bool liveLost = false;

	public int waveNumber;
	public Text wave;


	//public Text start;
	//public Text restart;
	//public Text gameOver;
	//public Text congratulations;

	public Text pressSpace;

	public GameState gameState = GameState.Playing;

	float initRespawnWaveTime = 2.0f;
	float respawnWaveTime;

	public AudioSource introMusic;
	public AudioSource recollectPointSound;
	public AudioSource deathSound;
	public AudioSource eatItemSound;
	public AudioSource eatGoshtSound;
	public AudioSource powerUpSound;

	// awake abans start, al start d'un altre classe podries voler accedir al manager y seria tot a la vegada
	void Awake ()
	{
		if (manager == null) {
			manager = new GameManager(); 
		} else {
			Destroy(this.gameObject);
		}
	}

	// Use this for initialization
	void Start () {
		//DontDestroyOnLoad (this.gameObject);
		//si carregem un altre escena no es destruira aquest object objecte, es mantindria
		//introMusic.Play ();

		respawnWaveTime = initRespawnWaveTime;
	}


	
	// Update is called once per frame
	void Update () {

		if (gameState == GameState.Start) {
			
			//start.enabled = true;
			//gameOver.enabled = false;
			//restart.enabled = false;
			//congratulations.enabled = false;

			if (Input.GetKey (KeyCode.Space)) {
				//start.enabled = false;
				gameState = GameState.Playing;
			}
				
		} else if (gameState == GameState.Playing) {
			Debug.Log ("playing");
			lives.enabled = true;
			lives.text = "" + numLives;


			if (liveLost) {
				numLives--;
				liveLost = false;
			}

			if (CompleteLevel()) {
				//congratulations.enabled = true;
				if (Input.GetKey(KeyCode.Space)) {
					//SceneManager.LoadScene ("Pac-Man-Level2");
				}
			}
		
		} else if (gameState == GameState.RespawningWave) {
			respawnWaveTime -= Time.deltaTime;
			if (respawnWaveTime < 0) {
				initRespawnWaveTime = respawnWaveTime;
				gameState = GameState.Playing;
			}

		} else if (gameState == GameState.GameOver) {
			//powerUpTime.enabled = false;
			//gameOver.enabled = true;
			//restart.enabled = true;
			if (Input.GetKey(KeyCode.Space)) {
				RestartLevel ();
			}
		}

	}

	bool CompleteLevel ()
	{
		bool completedLevel = false;
		Debug.Log (GameObject.FindGameObjectsWithTag ("Point") == null);
		if (GameObject.FindGameObjectsWithTag("Point") == null)
		{
			completedLevel = true;
		}
			return completedLevel;
	}

	void RestartLevel ()
	{
		Scene loadedLevel = SceneManager.GetActiveScene ();
		SceneManager.LoadScene (loadedLevel.name);
	}
}

public enum GameState 
{
	Start, Playing, RespawningWave, GameOver
}