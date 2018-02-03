﻿using UnityEngine;
using System.Collections;
using FSM;
using Steerings;

public class SeedSpawner : MonoBehaviour {

	private GameObject sample;

	public float interval = 20f; // one seed every interval seconds
	public float maxX = 400;
	public float maxY = 400;

	private float elapsedTime = 0f; // time elapsed since last generation

	void Start () {
		sample =  Resources.Load<GameObject> ("SEED");
		if (sample == null)
			Debug.LogError ("No SEED prefab found as a resource");

	}

	// Update is called once per frame
	void Update () {
		

		GameObject clone;
		if (elapsedTime >= interval) {
			// spawn creating an instance...
			clone = Instantiate(sample);
			clone.transform.position = new Vector3 (maxX*Utils.binomial(), maxY*Utils.binomial(),0);

			elapsedTime = 0;
		} else {
			elapsedTime += Time.deltaTime;
		}

	}
}
